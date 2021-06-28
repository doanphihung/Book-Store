<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'content',
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_category', 'category_id', 'book_id');
    }
        // Lấy tất cả books của category (cả những book bị softDelete) ---> thêm withTrashed() vào cuối.
    public function booksWithTrashed()
    {
        return $this->belongsToMany(Book::class, 'book_category', 'category_id', 'book_id')->withTrashed();
    }
}
