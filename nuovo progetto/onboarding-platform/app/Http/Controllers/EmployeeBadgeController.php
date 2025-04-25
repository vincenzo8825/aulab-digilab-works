<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeBadgeController extends Controller
{
    /**
     * Display a listing of the badges awarded to the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();
        $badges = $user->badges()->orderBy('awarded_at', 'desc')->get();
        
        return view('employee.badges.index', compact('badges'));
    }
}