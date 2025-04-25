<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('aboutUs');
    }
    public function profile(User $user)
    {

        return view('profile', compact('user'));
    }
}
