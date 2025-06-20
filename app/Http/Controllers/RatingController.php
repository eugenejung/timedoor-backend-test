<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('ratings', compact('authors'));
    }

    public function storeRating(Request $request)
    {
        // dd($request->all());
        $rating = Rating::where(['author_id' => $request->author_id, 'book_id' => $request->book_id])->first();
        // dd($rating);
        $data = [
            'author_id' => $request->author_id,
            'book_id' => $request->book_id,
            'voter' => $rating ? $rating->voter + 1 : 1,
            'rating' => $rating ? (($rating->rating + $request->rating) / 2) : $request->rating
        ];
        // dd($data);
        $store = Rating::create($data);
        $book = Book::where(['author_id' => $request->author_id, 'id' => $request->book_id])->first();
        $book->average_rating = ($book->average_rating + $request->rating) / 2;
        $book->save();

        return redirect()->route('home');
    }
}
