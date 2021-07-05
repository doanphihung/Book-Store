<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function books()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'order_id', 'book_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
}
