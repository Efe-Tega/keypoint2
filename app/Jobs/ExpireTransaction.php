<?php

namespace App\Jobs;

use App\Models\DepositTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExpireTransaction implements ShouldQueue
{
    use Dispatchable, SerializesModels, InteractsWithQueue, Queueable;

    protected $reference;

    /**
     * Create a new job instance.
     */
    public function __construct($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $transaction = DepositTransaction::where('trans_id', $this->reference)
            ->where('status', 'pending')
            ->first();

        if ($transaction) {
            $transaction->status = 'failed';
            $transaction->save();
        }
    }
}
