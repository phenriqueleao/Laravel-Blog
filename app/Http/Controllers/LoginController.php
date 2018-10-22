<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //Validar os dados de entrada
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ])->validate();

        //Autenticar o usuário

        //tentativa de login
        if (Auth::attempt($request->only('name', 'password'))) {
            //autenticado
            return view('artigos');
        } else {
            //credenciais invalidas
            return Redirect::back()->withErrors(['Credenciais inválidas']);
        }
    }
}
