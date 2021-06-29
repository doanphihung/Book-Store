<?php

namespace App\Http\Controllers\Page;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Services\Page\BookService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Prophecy\Argument\Token\ArrayCountToken;

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
        }
//        return redirect()->back();
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
        if (count($newCart->headsBook)) {
            Session::put('cart', $newCart);
            $cart = Session::get('cart');
            return response()->json($cart);
        } else {
            Session::forget('cart');
            Toastr::error('Cart is empty!', 'CART');
            return response()->json(null);
        }
    }
}
