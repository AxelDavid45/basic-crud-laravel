<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Shows all users
    public function index()
    {
        $users = User::latest()->get();
        return view(
            'users.index',
            [
                'users' => $users
            ]
        );
    }

    // Store a new user
    public function store(Request $request)
    {
        //Validate data
        $request->validate(
            [
                'name'     => ['required'],
                'email'    => ['required', 'unique:users', 'email'],
                'password' => ['required', 'min:8']
            ]
        );
        // Create the user
        User::create(
            [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password
            ]
        );

        return back();
    }

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

}
