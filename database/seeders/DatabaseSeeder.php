<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Status;
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

        Organization::factory()
            ->count(11)
            ->hasClients(3)
            ->create();

        $organizations = Organization::factory()
            ->count(3)
            ->hasClients(11)
            ->create();

        $organizations->each(function($organization) {
            $organization->clients->each(function($client) {
                Project::factory()
                    ->count(11)
                    ->for($client)
                    ->create();
            });
        });

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::factory()->count(15)->create();
    }
}
