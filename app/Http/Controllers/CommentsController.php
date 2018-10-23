<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;
use Validator;
use Redirect;

class CommentsController extends Controller
{
    public function createCommentSubmit(Request $request, $slug)
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        Validator::make($request->all(), [
            'text' => 'required'
        ])->validate();
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return Redirect::to('/');
        }
        
        $comment = new Comment();
        $comment->comment = $request->get('text');
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->save();

        return Redirect::to('/artigo/' . $post->slug);
    }
}
