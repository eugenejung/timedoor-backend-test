<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'book_id', 'id');
    }

    public function firstRating()
    {
        return $this->hasOne(Rating::class)->orderBy('id');
    }
}
