<?php

namespace App\Http\Controllers;

use App\Models\Mlist;
use App\Models\MlistMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MlistController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        return view('lists.settings.index', [
            'lists' => Mlist::where('user_id', $id)->orderBy('title', 'asc')->paginate(2)->withQueryString()
        ]);
    }

    public function show()
    {
        $id = Auth::user()->id;
        $lists = Mlist::where('user_id', $id)
            ->get();

        return view('lists.index', compact('lists'));
    }


    public function create()
    {
        return view('lists.settings.create');
    }

    public function store(Request $request)
    {


        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:40']
        ]);

        $attributes['user_id'] = $request->user()->id;

        Mlist::create($attributes);

        return redirect('/lists/settings')
            ->with([
                'success' => 'List is Added!',
                'color' => 'primary'
            ]);
    }

    public function edit(Mlist $list)
    {
        return view('lists.settings.edit', ['list' => $list]);
    }

    public function update(Mlist $list)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:40'],

        ]);

        $list->update($attributes);

        return redirect('/lists/settings')->with([
            'success' => 'List is Updated!',
            'color' => 'primary'
        ]);
    }

    public function destroy(Mlist $list)
    {
        $list->delete();
        return back()->with([
            'success' => 'List is Deleted!',
            'color' => 'primary'
        ]);
    }
}