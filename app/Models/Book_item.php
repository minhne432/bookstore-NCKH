<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_item extends Model
{
    use HasFactory;

    protected $table = 'book_item';

    protected $fillable = [
        'isbn13',
        'isbn10',
        'title',
        'subtitle',
        'authors',
        'categories',
        'thumbnail',
        'description',
        'published_year',
        'average_rating',
        'num_pages',
        'ratings_count',
    ];
}
