<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::distinct()->with(['author', 'category', 'firstRating'])->orderBy('average_rating', 'desc')->get()->take(10);
        // dd($data);

        return view('books', compact('data'));
    }

    public function filterBooks(Request $request)
    {
        $data = Book::with(['author', 'category', 'firstRating'])
                ->when($request->search, function ($query, $search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('book_name', 'like', "%$search%")
                        ->orWhereHas('author', function ($q) use ($search) {
                            $q->where('name', 'like', "%$search%");
                        });
                    });
                })
                ->orderByDesc('average_rating')
                ->distinct()
                ->take($request->limit)
                ->get();

        return view('books', compact('data'));
    }

    public function filterBooksByAuthor($id)
    {
        $data = Book::where('author_id', $id)->select('id', 'book_name')->get();

        return response()->json($data);
    }
}
