<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = ['title', 'slug', 'body', 'image', 'published'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

