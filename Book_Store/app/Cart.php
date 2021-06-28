<?php
namespace App;

class Cart {
    public $books = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->books = $cart->books;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addCart($book, $id)
    {
       $newBook = [
           'quantity' => 0,
           'price' => $book->price,
           'bookInfo' => $book,
       ];

       if ($this->books) {
           if (array_key_exists($id, $this->books)) {
               $newBook = $this->books[$id];
           }
       }
       $newBook['quantity']++;
       $newBook['price'] = $newBook['quantity'] * $book->price;
       $this->books[$id] = $newBook;
       $this->totalPrice += $book->price;
       $this->totalQuantity++;
    }
}
