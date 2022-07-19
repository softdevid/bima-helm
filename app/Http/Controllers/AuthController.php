<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }

    public function registration(Request $request)
    {
        $validateData = $request->validate([
            'frontName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'noTelp' => '',
            'password' => 'required|min:5|max:255'
        ]);

        dd('berhasil');
    }
}
