<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
