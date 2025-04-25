<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
        
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }
    
    public function setAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();
        
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso amministratore l\'utente scelto');
    }
    
    public function setRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso revisore l\'utente scelto');
    }
    
    public function setWriter(User $user)
    {
        $user->is_writer = true;
        $user->save();
        
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso redattore l\'utente scelto');
    }
    
    /**
     */
    public function rejectRequest(User $user)
    {
        $userName = $user->name;
        $role = '';
        
        // Determina quale ruolo è stato richiesto
        if ($user->is_admin === NULL) {
            $user->is_admin = false;
            $role = 'amministratore';
        } elseif ($user->is_revisor === NULL) {
            $user->is_revisor = false;
            $role = 'revisore';
        } elseif ($user->is_writer === NULL) {
            $user->is_writer = false;
            $role = 'redattore';
        }
        
        $user->save();
        
        return redirect()->back()->with('message', "La richiesta di {$userName} per il ruolo di {$role} è stata eliminata");
    }
}