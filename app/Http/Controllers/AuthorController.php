<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        // $data = Author::whereHas('firstRating', function ($q){
        //             $q->where('voter', '>=', 5);
        //         })
        //         ->orderByDesc('ratings.voter')
        //         ->distinct()
        //         ->take(10)
        //         ->get();
        $data = DB::table('authors')->leftJoin('ratings', 'authors.id', '=', 'ratings.author_id')->select('authors.name', 'ratings.voter')->orderByDesc('ratings.voter')->limit(10)->get();

        return view('authors', compact('data'));
    }
}
