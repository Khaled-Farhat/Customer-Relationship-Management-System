<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'name' => 'Open'
            ], [
                'name' => 'In-Progress',
            ], [
                'name' => 'Closed',
            ],
        ]);
    }
}
