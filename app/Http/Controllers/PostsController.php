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
    // ENVIA PARA FORMULARIO DE CRIAÇÃO DE ARTIGO
    public function createPost()
    {
        //tem que estar autenticado
        if(!Auth::check()){
            return Redirect::to('/login');
        }
        return view('criar-artigo');
    }

    // CRIA NOVO ARTIGO
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

    // PEGA UM POST PARA EDITAR
    public function getPostEdit($postSlug)
    {
        $post = Post::where('slug', $postSlug)->first();

        if($post && $post->author->id == Auth::id()){
            return view('editar-artigo')->with('artigo', $post);
        }

        return 'Usuário não autorizado ou post não existe!';
    }

    // ENVIA PARA FORMULÁRIO DE EDIÇÃO DE ARTIGO E EDITA
    public function postEditSubmit(Request $request, $slug)
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

    // APAGAR ARTIGO
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

    // LISTA TODOS OS ARTIGOS
    public function allPosts()
    {
        //pega todos os posts e coloca em uma coleção
        $posts = Post::all();

        return view('artigos')->with('artigos', $posts);
    }

    // PEGA SOMENTE UM ARTIGO
    public function getPost($postSlug)
    {
        $post = Post::where('slug', $postSlug)->first();

        return view('ver-artigo')->with('artigo', $post);
    }
}
