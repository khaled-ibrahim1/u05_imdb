<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class WatchlistController extends Controller
{

    public function store(Request $request, Movie $movie)
    {
        //Checks if movie already in watchlist
        $id = Auth::user()->id;
        if (Watchlist::where('user_id', $id)->where('movie_id', $request->movie_id)->exists()) {
            return back()->with([
                'success' => 'Movie Already in Watchlist!',
                'color' => 'danger'
            ]);
        } else { //If not it adds the movie
    
            $attributes = request()->validate([
                'movie_id' => 'required',
            ]);
            
            $attributes['user_id'] = $request->user()->id;

            Watchlist::create($attributes);
            
            return back()->with([
                'success' => 'Movie Added To Watchlist!',
                'color' => 'success'
            ]);
        }
    }

    public function show()
    {
        $id = Auth::user()->id;
        $watchlists = Watchlist::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(8)->withQueryString();

        return view('movies.watchlist', [
            'watchlists' => $watchlists
        ]);
    }



    public function destroy()
    {
        // Deletes by movie->id from show blade or from watchlist->id from watchlist blade
        $movieId = request('movie_id');
        $id = request('id');

        if (isset($id)) {
            Watchlist::find($id)->delete();
            return back()->with([
                'success' => 'Movie Deleted From Watchlist!',
                'color' => 'danger'
            ]);
        } else {
            $id = Auth::user()->id;
            Watchlist::where('movie_id', $movieId)->where('user_id', $id)->delete();
            return back()->with([
                'success' => 'Movie Deleted From Watchlist!',
                'color' => 'danger'
            ]);
        }
    }
}
