<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'books';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'price',
        'amount',
        'recommend',
        'hot',
        'publication_date',
        'content'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id', 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Book::class, 'order_details', 'book_id', 'order_id');
    }
}
