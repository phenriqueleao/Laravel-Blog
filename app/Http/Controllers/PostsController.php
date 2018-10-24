<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Storage;
use Redirect;
use Auth;

class PostsController extends Controller
{
    //retornar a tela de criação de post
    public function createPost()
    {
        //tem que estar autenticado
        if(!Auth::check()){
            return Redirect::to('/login');
        }
        return view('criar-artigo');
    }

    public function postSubmit(Request $request)
    {
        //tem que estar autenticado
        if(!Auth::check()){
            return Redirect::to('/login');
        }

        Validator::make($request->all(), [
            'image' => 'nullable|image',
            'text'  => 'required',
            'title' => 'required|max:255|unique:posts'
        ])->validate();

    }
}
