<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    //

    protected $table = 'book_categories';

    protected $fillable = [
        'book_id',
        'category_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
