<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'ISBN', 'ISBN');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
