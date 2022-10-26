<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieCommentsController extends Controller
{
    public function store(Movie $movie)
    {

        // validation
        request()->validate([
            'body' => ['required', 'min:10', 'max:1000'],
            'stars' => 'required'
        ]);

        // add a comment for the given post
        $movie->comments()->create([
            'user_id' => request()->user()->id,
            'stars' => request('stars'),
            'body' => request('body')
        ]);

        // Redirect
        return back()->with([
            'success' => 'Your comment needs to be approved!',
            'color' => 'primary'
        ]);
    }
}
