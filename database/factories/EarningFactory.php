<?php

namespace Database\Factories;

use App\Models\Earning;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Earning>
 */
class EarningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Earning::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'today_earning' => $this->faker->randomFloat(2, 0, 500),
            'yesterday_earning' => $this->faker->randomFloat(2, 0, 500),
            'this_week_earning' => $this->faker->randomFloat(2, 0, 3000),
            'this_month_earning' => $this->faker->randomFloat(2, 0, 10000),
            'total_earning' => $this->faker->randomFloat(2, 0, 50000),
        ];
    }
}
