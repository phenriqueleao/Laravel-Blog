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
    //
    //mostrar a pagina de criação de conta
    public function showRegister()
    {
        return view('criar-conta');
    }

    //enviar os dados de criação de conta
    public function createAccount(Request $request)
    {
        //validar os dados do forumulário de cadastro
        Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ])->validate();

        //criar o usuário
        $user = User::create(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]
        );
        //autenticar usuário
        Auth::login($user);
        return Redirect::to('/');

    }
}
