<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        
        \App\Models\User::factory(50)->create()->each(function ($user) {
            $user->partner_preference()->create([
                'manglik' => $user->manglik,
                'expected_income' => fake()->randomElement(['100000 - 400000', '500000 - 1000000', '1100000 - 1500000', '1600000 - 2000000', '2000000 - 5000000']),
                'occupation' => json_encode([ fake()->randomElement([ "Private Job", "Government Job", "Business" ]) ]),
                'family_type' => json_encode([ fake()->randomElement([ "Joint Family", "Nuclear Family", "Business" ]) ])
            ]);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
