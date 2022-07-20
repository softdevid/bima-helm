<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function registration(Request $request)
    {

        $request->validate([
            'frontName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'noTelp' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'postalCode' => 'required',
            'address' => 'required',
        ]);

        $validatedUser = $request->only(['frontName', 'lastName', 'email', 'noTelp', 'password']);
        $validatedUser['password'] = Hash::make($validatedUser['password']);

        $validatedAddress = $request->only(['province', 'city', 'district', 'village', 'postalCode', 'address']);

        $user = User::create($validatedUser);
        $user->address()->create($validatedAddress);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}
