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
            'name' => 'Example User',
            'email' => 'example@example.com',
            'password' => '123456',
            'cpf' => '15267354075',
            'phone' => '83995057024',
        ]);
    }
}
