<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class, 'ISBN', 'ISBN');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_id', 'ISBN');
    }

}
