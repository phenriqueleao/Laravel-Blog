<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //mostrar a tela de login
    public function showLogin()
    {
        //nome do arquivo sem o .blade.php
        return view('login');
    }


}
