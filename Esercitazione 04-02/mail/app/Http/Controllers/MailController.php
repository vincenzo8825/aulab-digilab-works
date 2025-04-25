<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function contactUs()
    {
        return view('contatti');
    }

    public function contactSubmit(Request $request)
    {
        $nome = $request->input('name');
        $mail = $request->input('email');
        $message = $request->input('message');
        Mail::to($mail)->send(new Contact);
        dd('mail inviata');
    }
}
