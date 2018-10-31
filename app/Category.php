<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
        
    }
}
