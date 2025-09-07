<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Mustafa Salem',
            'email' => 'mostafasalem25682@gmail.com',
            'password' => 'mostafasalem123',
            'phone' => fake()->phoneNumber,
            'image_url' => fake()->imageUrl
        ]);

        $this->call(DestinationSeeder::class);
    }
}