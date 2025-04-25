<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Visualizza il profilo dell'utente
    public function show()
    {
        // Recupera il profilo dell'utente, se esiste
        $profile = Auth::user()->profile;

        // Se il profilo non esiste, crealo
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = Auth::id(); // Associa il profilo all'utente
            $profile->address = null;
            $profile->phone = null;
            $profile->avatar = null;
            $profile->save(); // Salva il nuovo profilo
        }

        return view('profiles.profile', compact('profile'));
    }

    // Modifica il profilo dell'utente
    public function edit()
    {
        $profile = Auth::user()->profile;

        // Se il profilo non esiste, crealo
        if (!$profile) {
            $profile = new Profile();
        }

        return view('profiles.edit', compact('profile'));
    }

    // Aggiorna il profilo dell'utente
    public function update(Request $request)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:1024', // Limitato a 1MB
        ]);

        // Ottieni il profilo dell'utente
        $profile = Auth::user()->profile;

        // Se l'utente non ha un profilo, lo creiamo
        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = Auth::id();
        }

        // Aggiorna i campi del profilo
        $profile->address = $validated['address'] ?? $profile->address;
        $profile->phone = $validated['phone'] ?? $profile->phone;

        // Se è stato caricato un avatar, salvalo
        if ($request->hasFile('avatar')) {
            // Elimina il vecchio avatar se esiste
            if ($profile->avatar) {
                Storage::delete($profile->avatar);
            }

            // Salva il nuovo avatar
            $profile->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Salva le modifiche
        $profile->save();

        // Redirect al profilo con un messaggio di successo
        return redirect()->route('profile.show')->with('success', 'Profilo aggiornato con successo!');
    }
}
