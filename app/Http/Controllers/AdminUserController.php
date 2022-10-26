<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        //
        return view("admin.users.index", [
            "users" => User::orderBy("username", "asc")->paginate(20)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function edit(User $user)
    {
        return view("admin.users.edit", ["user" => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            "username" => "required",
            /* "name" => [
                "required",
                Rule::unique("movies", "slug")->ignore($movie),
            ], */
            "name" => "required",
            "email" => "required",
            "is_admin" => "required",
        ]);

        $user->update($attributes);

        return redirect("/admin/dashboard/users")->with([
            'success' => 'User is Updated!',
            'color' => 'primary'
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            "username" => ['required', 'min:3', 'max:255', 'unique:users,username'],
            "password" => ['required', 'min:7', 'max:255'],
            "name" => ['required', 'max:255'],
            "email" => ['required', 'max:255', 'unique:users,email'],
            "is_admin" => "required",
        ]);


        User::create($attributes);

        return redirect("/admin/dashboard/users")
            ->with([
                'success' => 'User is Added!',
                'color' => 'primary'
            ]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with([
            'success' => 'User is Deleted!',
            'color' => 'primary'
        ]);
    }
}
