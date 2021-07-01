<?php

namespace App\Http\Controllers\Page;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Services\Page\BookService;
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
            $cart = Session::get('cart');
            return response()->json($cart);
        }
    }

    public function cartDetails()
    {
        if (Session('cart')) {
            $totalPrice = Session('cart')->totalPrice;
            $totalQuantity = Session('cart')->totalQuantity;
            $headsBook = Session('cart')->headsBook;
            return view('pages.cart.cart-details', compact('totalPrice', 'totalQuantity', 'headsBook'));
        } else {
            Toastr::error('Cart is empty!', 'CART');
            return view('pages.cart.cart-details');
        }
    }

    public function deleteHeadBook($id)
    {
        $oldCart = Session('cart') ?? null;
        $newCart = new Cart($oldCart);
        $newCart->deleteHeadBook($id);
        Session::put('cart', $newCart);
        $cart = Session::get('cart');
        return response()->json($cart);
    }

    public function cartQuantityUp($id)
    {
        $book = $this->bookService->getDetails($id);
        $oldCart = Session('cart') ?? null;
        $newCart = new Cart($oldCart);
        $newCart->cartQuantityUp($id);
        Session::put('cart', $newCart);
        $cart = Session::get('cart');
        return response()->json($cart);
    }

    public function cartQuantityDown($id)
    {
        $book = $this->bookService->getDetails($id);
        $oldCart = Session('cart') ?? null;
        $newCart = new Cart($oldCart);
        $newCart->cartQuantityDown($id);
        Session::put('cart', $newCart);
        $cart = Session::get('cart');
        return response()->json($cart);
    }

    public function checkout()
    {
        if (Session('cart')) {
            $totalPrice = Session('cart')->totalPrice;
            $totalQuantity = Session('cart')->totalQuantity;
            $headsBook = Session('cart')->headsBook;
            return view('pages.cart.checkout', compact('totalPrice', 'totalQuantity', 'headsBook'));
        } else {
            Toastr::error('Cart is empty!', 'CART');
            return back();
        }
    }
}
