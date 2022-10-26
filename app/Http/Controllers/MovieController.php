<?php

namespace App\Http\Controllers;

use App\Models\Mlist;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;


class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::filter(
                request(['search', 'category'])
            )
                ->orderBy('year', 'desc')
                ->orderBy('title', 'desc')
                ->paginate(8)->withQueryString()
        ]);
    }

    public function show(Movie $movie)
    {
        if (Auth::check()) {
            $categories = Movie::where('category_id', $movie->category_id)->inRandomOrder()->get();
            $lists = Mlist::where('user_id', Auth::user()->id)->orderBy('title', 'asc')->get();
            $watchlist = Watchlist::where('user_id', Auth::user()->id)->get();

            if (!$lists->count()) {
                $lists = false;
            }

           


            return view('movies.show', [
                'movie' => $movie,
                'watchlist' => $watchlist,
                'lists' => $lists,
                'categories' => $categories
            ]);
        } else {
            $categories = Movie::where('category_id', $movie->category_id)->inRandomOrder()->get();

            return view('movies.show', [
                'movie' => $movie,
                'watchlist' => false,
                'lists' => false,
                'categories' => $categories
            ]);
        }
    }
}
