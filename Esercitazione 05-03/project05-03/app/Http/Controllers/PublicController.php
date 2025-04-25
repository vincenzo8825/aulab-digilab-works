<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        return view('welcome');
    }

    public function errorpage(){
        return view('posts.error');
    }
}
