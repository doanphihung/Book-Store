<?php

namespace App\Http\Controllers\Page;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Services\Page\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function addCart($id)
    {
        $book = $this->bookService->getDetails($id);
        if ($book) {
                $oldCart = Session('cart') ?? null;
                $newCart = new Cart($oldCart);
                $newCart->addCart($book, $id);
                Session::put('cart', $newCart);
                Toastr::success('Add book to cart success!', 'CART');
        }
        return redirect()->route('store.list');
    }

    public function cartDetails()
    {
        if (Session('cart')) {
            $totalPrice = Session('cart')->totalPrice;
            $totalQuantity = Session('cart')->totalQuantity;
            $headsBook = Session('cart')->books;
            return view('pages.cart.cart-details', compact('totalPrice', 'totalQuantity', 'headsBook'));
        } else {
            Toastr::error('You need add book to cart!', 'CART');
            return redirect()->back();
        }
    }
}
