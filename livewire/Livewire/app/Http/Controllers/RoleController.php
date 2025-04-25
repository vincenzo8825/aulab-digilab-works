<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {


        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('roles.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        if (!Gate::allows('manage-roles')) {
            abort(403);
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $role = Role::findOrFail($request->role_id);

        if ($role->name === 'reviewer') {
            $user->roles()->syncWithoutDetaching([$role->id]);
            return redirect()->route('roles.index')->with('success', 'Ruolo assegnato con successo');
        }

        return redirect()->route('roles.index')->with('error', 'Non puoi assegnare questo ruolo');
    }

    public function removeRole(User $user, Role $role)
    {
        if (!Gate::allows('manage-roles')) {
            abort(403);
        }

        if ($role->name === 'reviewer') {
            $user->roles()->detach($role);
            return redirect()->route('roles.index')->with('success', 'Ruolo rimosso con successo');
        }

        return redirect()->route('roles.index')->with('error', 'Non puoi rimuovere questo ruolo');
    }
}
