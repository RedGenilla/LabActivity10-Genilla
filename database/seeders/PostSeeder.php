<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Retrieve all five existing authors.
        $authors = Author::all();

        // Generate 40 published posts.
        // Assign each post to a random existing author.
        Post::factory()->count(40)
            ->sequence(fn ($sequence) => [
                'author_id' => $authors->random()->id,
            ])
            ->create();

        // Generate 10 draft posts.
        // The draft() state makes them unpublished.
        Post::factory()->count(10)->draft()
            ->sequence(fn ($sequence) => [
                'author_id' => $authors->random()->id,
            ])
            ->create();

        // Find my personalized Kagawad.
        $kagawad = Author::where(
            'email',
            'kagawad.genilla@bulletin.test'
        )->firstOrFail();

        // Create my personalized pinned post manually.
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Genilla Clean-up Drive',
            'category' => 'Announcement',

            // Content of the community announcement.
            'body' => 'Residents of Purok Genilla are invited to join our community clean-up drive. Everyone is encouraged to participate in keeping our neighborhood clean and safe.',

            // Make the post visible to residents.
            'is_published' => true,

            // Display this announcement before regular posts.
            'is_pinned' => true,

            // TODO: Change this to your birthday in 2026.
            'published_at' => '2026-09-15 08:00:00',

            // New posts start with zero views.
            'views' => 0,
        ]);
    }
}

