<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResetUserTasks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $taskCount = 0;

            if ($user->level_id == 1) {
                $taskCount = 10;
            } elseif ($user->level_id == 2) {
                $taskCount = 15;
            }

            $user->remaining_task = $taskCount;
            $user->task_completed = 0;
            $user->save();
        }
    }
}
