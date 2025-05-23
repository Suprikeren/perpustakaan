<?php

namespace App\Models;

use App\Models\Category;
use App\Models\LoanBook;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    protected $table = 'books';

    protected $fillable = [
        'avatar',
        'title',
        'author',
        'publication_date',
        'isbn',
        'status',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'book_categories', 'book_id','category_id');
    }

    public function loanBooks(){
        return $this->hasMany(LoanBook::class, 'book_id');
    }
}
