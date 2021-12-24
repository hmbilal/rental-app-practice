<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(5)
            ->create();

        User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@rental-app.local',
            ]);
    }
}
