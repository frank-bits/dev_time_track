<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Client;
use App\Models\Rate;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Client::factory()
        ->hasProjects(3)
        ->create();

        Activity::factory()->create();

        Rate::factory()
        ->hasActivity('activity_id', 1)
        ->hasProject(['project_id'=> 1])
        ->hasUser(['user_id' => 1])
        ->create();

    
    }
}
