<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepositTransaction;
use App\Services\MonnifyService;
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
        ]);

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
                return view('user.content.deposit.callback', ['message' => 'Payment successful']);
            } else {

                // If not paid, mark as failed
                $transaction->update(['status' => 'failed']);
                return view('user.content.deposit.callback', ['message' => 'Payment failed or cancelled']);
            }
        }
    }
}
