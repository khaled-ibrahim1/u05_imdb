<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminCommentController extends Controller
{
    public function index()
    {
        return view('admin.approvalComments', [
            'comments' => Comment::all()->reverse()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'stars' => 'required',
            'body' => 'required',
            'approved' => 'required',
            'created_at' => 'required',
            'movie_id' => ['required', Rule::exists('movies', 'id')],
            'user_id' => ['required', Rule::exists('user', 'id')]
        ]);

        Comment::create($attributes);

        return redirect('/');
    }


    public function approval(Comment $comment)
    {

        $comment->approved = '1';
        $comment->save();

        return back()->with([
            'success' => 'Comment is now published!',
            'color' => 'primary'
        ]);
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with([
            'success' => 'Comment is Deleted!',
            'color' => 'primary'
        ]);
    }
}
