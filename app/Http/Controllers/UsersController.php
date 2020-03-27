<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Hash;

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
    public function store(StoreUserPost $request)
    {
        //The data is validated with the StoreUserPost
        // Create the user
        User::create(
            [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password)
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
