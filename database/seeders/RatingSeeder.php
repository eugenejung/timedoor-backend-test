<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorIds = Author::pluck('id')->toArray();
        $bookIds = Book::pluck('id')->toArray();
        $ratings = [];

        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => fake()->randomElement($bookIds),
                'author_id' => fake()->randomElement($authorIds),
                'rating' => fake()->numberBetween(1, 10),
                'voter' => fake()->numberBetween(0, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert in chunks to avoid memory issues
            if (count($ratings) === 1000) {
                Rating::insert($ratings);
                $ratings = [];
            }
        }

        // Insert remaining ratings
        if (!empty($ratings)) {
            Rating::insert($ratings);
        }
    }
}
