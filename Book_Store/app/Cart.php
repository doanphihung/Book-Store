<?php
namespace App;

class Cart {
    public $headsBook = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->headsBook = $cart->headsBook;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addCart($book, $id)
    {
       $newHeadBook = [
           'quantity' => 0,
           'price' => $book->price,
           'bookInfo' => $book,
       ];

       if ($this->headsBook) {
           if (array_key_exists($id, $this->headsBook)) {
               $newHeadBook = $this->headsBook[$id];
           }
       }
       $newHeadBook['quantity']++;
       $newHeadBook['price'] = $newHeadBook['quantity'] * $book->price;
       $this->headsBook[$id] = $newHeadBook;
       $this->totalPrice += $book->price;
       $this->totalQuantity++;
    }

    public function deleteHeadBook($id)
    {
        if ($this->headsBook) {
            if (array_key_exists($id, $this->headsBook)) {
                $this->totalQuantity -= $this->headsBook[$id]['quantity'];
                $this->totalPrice -= $this->headsBook[$id]['price'];
                unset($this->headsBook[$id]);
            }
        }
    }

    public function cartQuantityUp($id)
    {
        $this->headsBook[$id]['quantity']++ ;
        $this->headsBook[$id]['price'] += $this->headsBook[$id]['bookInfo']->price;
        $this->totalPrice += $this->headsBook[$id]['bookInfo']->price;
        $this->totalQuantity++;
    }

    public function cartQuantityDown($id)
    {
        if ($this->headsBook[$id]['quantity'] > 0) {
            $this->headsBook[$id]['quantity']--;
            $this->headsBook[$id]['price'] -= $this->headsBook[$id]['bookInfo']->price;
            $this->totalPrice -= $this->headsBook[$id]['bookInfo']->price;
            $this->totalQuantity--;
        }
    }
}
