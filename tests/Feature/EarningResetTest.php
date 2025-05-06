<?php

namespace Tests\Feature;

use App\Models\Earning;
use App\Services\EarningResetService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EarningResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_earnings_reset_normal_day()
    {
        $earning = Earning::factory()->create([
            'today_earning' => 100,
            'this_week_earning' => 200,
            'this_month_earning' => 500,
            'total_earning' => 1000,
        ]);

        $date = Carbon::parse('2025-05-03 23:00:00');
        (new EarningResetService)->resetEarnings($date);

        $earning->refresh();

        $this->assertEquals(100, $earning->yesterday_earning);
        $this->assertEquals(300, $earning->this_week_earning);
        $this->assertEquals(600, $earning->this_month_earning);
        $this->assertEquals(1100, $earning->total_earning);
        $this->assertEquals(0, $earning->today_earning);
    }

    public function test_earnings_reset_on_monday()
    {
        $earning = Earning::factory()->create([
            'today_earning' => 50,
            'this_week_earning' => 150,
            'this_month_earning' => 130,
            'total_earning' => 900,
        ]);

        $date = Carbon::parse('2025-05-05 23:00:00');
        (new EarningResetService)->resetEarnings($date);

        $earning->refresh();

        $this->assertEquals(50, $earning->yesterday_earning);
        $this->assertEquals(0, $earning->this_week_earning);
        $this->assertEquals(180, $earning->this_month_earning);
        $this->assertEquals(950, $earning->total_earning);
        $this->assertEquals(0, $earning->today_earning);
    }

    public function test_earnings_reset_on_first_of_month()
    {
        $earning = Earning::factory()->create([
            'today_earning' => 30,
            'this_week_earning' => 90,
            'this_month_earning' => 200,
            'total_earning' => 800,
        ]);

        $date = Carbon::parse('2025-06-01 23:00:00');
        (new EarningResetService)->resetEarnings($date);

        $earning->refresh();

        $this->assertEquals(30, $earning->yesterday_earning);
        $this->assertEquals(120, $earning->this_week_earning);
        $this->assertEquals(0, $earning->this_month_earning);
        $this->assertEquals(830, $earning->total_earning);
        $this->assertEquals(0, $earning->today_earning);
    }
}
