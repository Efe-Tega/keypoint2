<?php

namespace App\Services;

use App\Models\Earning;
use Carbon\Carbon;

class EarningResetService
{
    public function resetEarnings(Carbon $now = null)
    {
        $now = $now ?: now();
        $earnings = Earning::all();

        foreach ($earnings as $earning) {
            $earning->yesterday_earning = $earning->today_earning;
            $earning->this_week_earning += $earning->today_earning;
            $earning->this_month_earning += $earning->today_earning;
            $earning->total_earning += $earning->today_earning;
            $earning->today_earning = 0;

            if ($now->isMonday()) {
                $earning->this_week_earning = 0;
            }

            if ($now->day === 1) {
                $earning->this_month_earning = 0;
            }

            $earning->save();
        }
    }
}
