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

        //salvando a imagem no servidor e retornando o caminho
        $imagePath = '';
        if ($request->file('image')){
            $imagePath = Storage::disk('public')->put(
                '/posts-images', $request->file('image'));
        }

        $postCreated = Post::create([
            'title' => $request->get('title'),
            'text'  => $request->get('text'),
            'image_location' => $imagePath,
            'author_id' => Auth::id(),
            'slug' => str_slug($request->get('title'))
        ]);

        return Redirect::to('/');

    }

    //pegar todos os posts do banco
    public function allPosts()
    {
        //pega todos os posts e coloca em uma coleção
        $posts = Post::all();

        return view('artigos')->with('artigos', $posts);
    }
}
