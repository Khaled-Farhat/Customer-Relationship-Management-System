<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory()->create(),
            'manager_id' => User::factory()->create(),
            'status_id' => Status::inRandomOrder()->first(),
            'title' => $this->faker->words(3, true),
            'deadline' => $this->faker->dateTime(),
            'description' => $this->faker->paragraphs(1, true),
        ];
    }
}
