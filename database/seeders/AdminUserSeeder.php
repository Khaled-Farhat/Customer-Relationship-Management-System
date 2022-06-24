<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\AdminUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()
            ->hasRole('super-admin')
            ->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
            ]);
    }
}
