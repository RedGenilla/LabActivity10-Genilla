<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create authors first because posts need author IDs.
        // Then create the 51 bulletin posts.
        $this->call([
            AuthorSeeder::class,
            PostSeeder::class,
        ]);
    }
}