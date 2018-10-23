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
    public function postList()
    {
        $posts = Post::all();       
        return view('artigos')->with('artigos', $posts);
    }

    public function createPost()
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }        
        
        return view('criar-artigo');
    }

    public function getPost($postSlug)
    {
        $post = Post::where('slug', $postSlug)->first();
        
        return view('ver-artigo')->with('artigo', $post);
        
    }

    public function getPostEdit($slug)
    {
        $post = Post::where('slug', $slug)->first();
     
        if ($post && $post->author->id == Auth::id()) {
            return view('editar-artigo')->with('artigo', $post);
        }

        return 'não autorizado ou post não existe';

    }

    public function submitPostEdit(Request $request, $slug)
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts',
            'text' => 'required',
            'image' => 'nullable|image'
        ])->validate();

        $postEdit = Post::where('slug', $slug)->first();
        $postEdit->title = $request->get('title');
        $postEdit->text = $request->get('text');
        if ($request->has('image')) {
            Storage::disk('public')->delete($postEdit->image_location);
            $imagePath = Storage::disk('public')->put('/posts-images', $request->file('image'));
            $postEdit->image_location = $imagePath;
        }
        $postEdit->slug = str_slug($request->get('title'));
        $postEdit->save();

        return Redirect::to('/artigo/'.$postEdit->slug);
        
    }

    public function removePost($slug)
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        $postRemove = Post::where('slug', $slug)->first();

        if($postRemove && $postRemove->author->id == Auth::id()) {
            $postRemove->delete();
        }

        return Redirect::to('/');

    }

    public function createPostSubmit(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts',
            'text' => 'required',
            'image' => 'nullable|image'
        ])->validate();
        
        $imagePath = Storage::disk('public')->put('/posts-images', $request->file('image'));
            
        $postCreated = Post::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'image_location' => $imagePath,
            'slug' => str_slug($request->get('title')),
            'author_id' => Auth::id()
        ]);

        return Redirect::to('/');
    }
}
