<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\ExpireTransaction;
use App\Models\DepositTransaction;
use App\Models\Referral;
use App\Models\Wallet;
use App\Services\MonnifyService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request, MonnifyService $monnify)
    {
        $user = Auth::user();
        $reference = uniqid("txn_");


        DepositTransaction::create([
            'trans_id' => $reference,
            'user_id' => $user->id,
            'amount' => $request->amount,
            'created_at' => Carbon::now(),
        ]);

        $transaction = DepositTransaction::where('trans_id', $reference)->first();

        ExpireTransaction::dispatch($transaction->trans_id)
            ->delay(now()->addMinutes(40));

        $paymentData = [
            'amount' => $request->amount,
            'customerName' => $user->fullname,
            'customerEmail' => $user->email,
            'paymentReference' => $reference,
            'paymentDescription' => 'Account Deposit',
            'currencyCode' => 'NGN',
            'contractCode' => config('services.monnify.contract_code'),
            'redirectUrl' => route('payment.callback'),
            'paymentMethods' => ['CARD', 'ACCOUNT_TRANSFER']
        ];

        $response = $monnify->initializeTransaction($paymentData);

        if ($response['requestSuccessful']) {
            return redirect($response['responseBody']['checkoutUrl']);
        } else {
            return back()->with('error', 'Unable to initiate payment.');
        }
    }

    public function paymentCallback(Request $request, MonnifyService $monnify)
    {

        $reference = $request->input('paymentReference');

        if (!$reference) {
            return view('user.content.deposit.callback', ['message' => 'Transaction not found']);
        }

        $monnify = new MonnifyService();

        $response = $monnify->verifyTransaction($reference);


        if (
            isset($response['requestSuccessful']) && $response['requestSuccessful'] && isset($response['responseBody']['paymentStatus'])
        ) {
            $status = $response['responseBody']['paymentStatus'];

            $transaction = DepositTransaction::where('trans_id', $reference)->first();

            if ($transaction) {
                $transaction->status = strtolower($status);
                $transaction->save();
            }

            if ($status === 'PAID') {

                $user = Auth::user();
                $walletUpdate = Wallet::where('user_id', $user->id)->first();
                $walletUpdate->acct_bal += $transaction->amount;
                $walletUpdate->save();

                $referral = Referral::where('user_id', $user->id)->first();

                if ($referral) {
                    $percentage = $transaction->amount * 0.10;
                    $referral->referral_earnings = $percentage;
                    $referral->save();

                    $wallet = Wallet::where('user_id', $referral->referred_by)->first();

                    $wallet->referral_bal += $percentage;
                    $wallet->com_wallet += $percentage;
                    $wallet->save();
                }

                return view('user.content.deposit.callback', ['message' => 'Payment successful']);
            } else {

                // If not paid, mark as failed
                $transaction->update(['status' => 'failed']);
                return view('user.content.deposit.callback', ['message' => 'Payment failed or cancelled']);
            }
        }
    }
}
