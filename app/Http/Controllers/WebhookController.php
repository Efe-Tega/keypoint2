<?php

namespace App\Http\Controllers;

use App\Models\DepositTransaction;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleMonnify(Request $request)
    {
        $payload = $request->all();

        if ($payload['eventType'] === 'SUCCESSFUL_TRANSACTION') {
            $paymentReference = $payload['eventData']['paymentReference'];
            $transaction = DepositTransaction::where('trans_id', $paymentReference)->first();

            // update database
            if ($transaction && $transaction->status !== 'paid') {
                $transaction->update([
                    'status' => 'paid',
                    'paid_at' => now(),
                ]);
            }

            return response()->json(['message' => 'Payment processed'], 200);
        }

        return response()->json(['message' => 'Unhandled event'], 400);
    }
}
