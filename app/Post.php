<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'text',
        'image_location',
        'author_id',
        'slug'
    ];
    //relacao de autor com o post
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    //$post->author

    //relacao de post com comentarios
    public function comments()
    {                         //referencia do modelo
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    //$post->comments

}
