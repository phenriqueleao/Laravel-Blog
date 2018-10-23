<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;

class PostsController extends Controller
{
    public function postList()
    {
        $posts = Post::all();
        return view('artigos')->with(['artigos' => $posts]);
    }

    public function createPost()
    {
        return view('criar-artigo');
    }

    public function createPostSubmit(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts',
            'text' => 'required',
            'image' => 'nullable|image'
        ])->validate();

        

    }
}
