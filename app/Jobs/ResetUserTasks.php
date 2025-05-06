<?php

namespace App\Jobs;

use App\Models\Earning;
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
        $earnings = Earning::all();
        $today = Carbon::now();
        $users = User::all();

        foreach ($users as $user) {
            $taskCount = 0;

            if ($user->level_id == 1) {
                $taskCount = 1;
            } elseif ($user->level_id == 2) {
                $taskCount = 5;
            } elseif ($user->level_id == 3) {
                $taskCount = 10;
            } elseif ($user->level_id == 4) {
                $taskCount = 20;
            } elseif ($user->level_id == 5) {
                $taskCount = 30;
            } elseif ($user->level_id == 6) {
                $taskCount = 50;
            } elseif ($user->level_id == 7) {
                $taskCount = 80;
            } elseif ($user->level_id == 8) {
                $taskCount = 100;
            } elseif ($user->level_id == 9) {
                $taskCount = 160;
            } elseif ($user->level_id == 10) {
                $taskCount = 200;
            }

            $user->remaining_task = $taskCount;
            $user->task_completed = 0;
            $user->save();
        }

        foreach ($earnings as $earning) {
            // == Step 1 & 2
            $earning->yesterday_earning = $earning->today_earning;
            $earning->this_week_earning += $earning->today_earning;
            $earning->this_month_earning += $earning->today_earning;
            $earning->total_earning += $earning->today_earning;

            // Step 3
            $earning->today_earning = 0;

            // Step 4
            if ($today->isMonday()) {
                $earning->this_week_earning = 0;
            }

            // Step 5: Reset Monthly earning on 1st day of the month
            if ($today->day === 1) {
                $earning->this_month_earning = 0;
            }

            $earning->save();
        }
    }
}
