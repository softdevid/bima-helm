<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.profile", [
            "title" => "Akun Saya"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'frontName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            // 'email' => 'required|email:dns|unique:users',
            'noTelp' => 'required',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'postalCode' => 'required',
            'address' => 'required',
        ];
        if ($request->email != auth()->user()->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }
        $validateData = $request->validate($rules);

       $validateData['user'] = auth()->user()->id;
       $validatedUser = $request->only(['frontName', 'lastName', 'email', 'noTelp', 'password']);
        $validatedUser['password'] = Hash::make($validatedUser['password']);
        $validatedAddress = $request->only(['address']);

        $user = User::where('id', $validateData)->update();
        $user->address()->update($validatedAddress);

    //    User::where('id', auth()->user()->id)
    //                         ->update($validateData);

        return redirect('/my-account')->with('success', 'Registrasi berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}