<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->count(15)
            ->create();

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
    }
}
