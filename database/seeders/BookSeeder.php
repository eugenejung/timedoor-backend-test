<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorIds = Author::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        Book::factory()->count(100000)->make()->each(function ($book) use ($authorIds, $categoryIds) {
            $book->author_id = fake()->randomElement($authorIds);
            $book->category_id = fake()->randomElement($categoryIds);
            $book->save();
        });
    }
}
