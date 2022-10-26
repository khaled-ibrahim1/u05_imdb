<?php

namespace App\Http\Controllers;

use App\Models\Mlist;
use App\Models\MlistMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MlistMovieController extends Controller
{

    public function store(Request $request)
    {
        if (MlistMovie::where('movie_id', $request->movie_id)->where('mlist_id', $request->mlist_id)->exists()) {
            return back()->with([
                'success' => 'Movie is already in that list!',
                'color' => 'danger'
            ]);
        } else {
            $attributes = request()->validate([
                'mlist_id' => 'required',
                'movie_id' => 'required'
            ]);
            MlistMovie::create($attributes);
            return back()->with([
                'success' => 'Movie added to list!',
                'color' => 'success'
            ]);
        }
    }



    public function destroy()
    {

        $movieId = request('movie_id');
        $mlistId = request('mlist_id');


        MlistMovie::where('movie_id', $movieId)->where('mlist_id', $mlistId)->delete();
        return back()->with([
            'success' => 'Movie Deleted From List!',
            'color' => 'danger'
        ]);
    }
}
