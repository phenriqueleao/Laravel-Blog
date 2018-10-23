<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
