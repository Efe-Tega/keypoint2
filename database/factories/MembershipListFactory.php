<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembershipList>
 */
class MembershipListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nigeriaPrefix = ['070', '080', '081', '090', '091'];

        return [
            'phone' => $this->faker->randomElement($nigeriaPrefix) . $this->faker->numerify('########'),
            'amount' => number_format($this->faker->randomFloat(2, 10000, 50000), '2', '.', ''),
            // 'amount' => $this->faker->randomFloat(2, 10000, 50000),
        ];
    }
}
