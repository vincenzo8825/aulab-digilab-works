<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $programs = $user->programs;
        
        return view('employee.programs.index', compact('programs'));
    }
}