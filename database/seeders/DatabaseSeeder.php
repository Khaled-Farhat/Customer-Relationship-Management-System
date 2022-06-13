<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Status::insert([
            [
                'name' => 'Open'
            ], [
                'name' => 'In-Progress',
            ], [
                'name' => 'Closed',
            ],
        ]);

        $organizations = Organization::factory()
            ->count(3)
            ->create();

        $organizations->each(function($organization) {
            $clients = Client::factory()
                ->for($organization)
                ->count(3)
                ->create();

            $clients->each(function($client) {
                $projects = Project::factory()
                    ->for($client)
                    ->count(3)
                    ->create();

                $projects->each(function($project) {
                    $tasks = Task::factory()
                        ->for($project)
                        ->count(3)
                        ->create();
                });
            });
        });

        Project::factory()
            ->count(10)
            ->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::factory()->count(15)->create();
    }
}
