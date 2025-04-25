<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $favorites = $user->favorites()->latest()->take(5)->get();
        $reviews = $user->reviews()->with('article')->latest()->take(5)->get();
        
        return view('profile.show', compact('user', 'favorites', 'reviews'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Password aggiornata con successo!');
    }
}