<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Hourly',
            'rate' => $this->faker->randomFloat(2, 0, 100),
            'activity_id' => \App\Models\Activity::factory(),
            'project_id' => \App\Models\Project::factory(),
            'user_id' => \App\Models\User::factory(),

        ];
    }
}
