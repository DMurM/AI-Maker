<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'billing_cycle' => $this->faker->randomElement(['monthly', 'yearly']),
            'coins' => $this->faker->numberBetween(100, 10000),
            'benefits' => $this->faker->paragraph,
        ];
    }
}
