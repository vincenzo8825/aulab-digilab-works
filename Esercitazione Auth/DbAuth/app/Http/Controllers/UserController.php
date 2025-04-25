<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    // Metodo per gestire l'account
    public function index()
    {
        $users = User::all();  // Recupera tutti gli utenti
        return view('account.index', compact('users'));  // Passa gli utenti alla vista
    }

    // Metodo per eliminare un utente
    public function destroy(User $user)
    {
        $user->delete();  // Elimina l'utente
        return redirect()->route('account')->with('success', 'Utente eliminato con successo.');
    }

    // Metodo per visualizzare il profilo dell'utente
    public function showProfile(User $user)
{
    // dd($user);
    return view('account.profile', compact('user'));
}


}
