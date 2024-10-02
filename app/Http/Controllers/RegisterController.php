<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showErrRegistrationForm()
    {
        return view('auth.register_err');
    }

    public function showErcRegistrationForm()
    {
        return view('auth.register_erc');
    }
}
