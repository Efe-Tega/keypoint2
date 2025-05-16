<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendUserNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $messageNotificationId;
    /**
     * Create a new job instance.
     */
    public function __construct($messageNotificationId)
    {
        $this->messageNotificationId = $messageNotificationId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        User::chunk(100, function ($users) {
            $insertData = [];

            foreach ($users as $user) {
                $insertData[] = [
                    'user_id' => $user->id,
                    'message_notification_id' => $this->messageNotificationId,
                    'created_at' => Carbon::now(),
                ];
            }

            UserMessage::insert($insertData);
        });
    }
}
