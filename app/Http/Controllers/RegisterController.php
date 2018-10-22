<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use Redirect;
use App\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('criar-conta');
    }

    public function createAccount(Request $request)
    {
        //Validar os dados de entrada
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ])->validate();

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        Auth::login($user);

        return Redirect::to('/');
    }
}
