<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory()->create(),
            'user_id' => User::factory()->create(),
            'status_id' => Status::inRandomOrder()->first(),
            'title' => $this->faker->words(3, true),
            'deadline' => $this->faker->dateTime(),
            'description' => $this->faker->paragraphs(1, true),
        ];
    }
}
