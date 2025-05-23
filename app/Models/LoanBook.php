<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LoanBook extends Model
{
    protected $table = 'loan_books';

    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'return_date',
        'status',
        'late_change',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
