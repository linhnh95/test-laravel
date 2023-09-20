<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'root@root.com',
            'password' => password_hash('123456', 1),
        ]);
        $this->call([
            BrandSeeder::class
        ]);

    }
}
