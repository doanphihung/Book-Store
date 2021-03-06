<?php

namespace App\Http\Repositories;

use App\Models\Book;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\OrderDetails;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    protected $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function saveOrder($order)
    {
        DB::beginTransaction();
        try {
            $order->save();
            session()->put('orderId', $order->id);   // Lấy ID để tìm đơn hàng in ra bill
            if (session('cart')) {
        $headsBook = session()->get('cart')->headsBook;
                foreach ($headsBook as $key => $headBook) {
                    $orderDetails = new OrderDetails();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->book_id = $headBook['bookInfo']->id;
                    $orderDetails->each_price = $headBook['bookInfo']->price;
                    $orderDetails->quantity = $headBook['quantity'];
                    $orderDetails->total_price = $headBook['price'];
                    $orderDetails->save();
                    $book = Book::find($headBook['bookInfo']->id);
                    $book->amount -= $headBook['quantity'];
                    $book->save();
                }
                session()->forget('cart');
            }
            DB::commit();
            session()->flash('orderSuccess', 'Order success!');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Ordered Fail!', 'Fail');

        }
    }

    public function findOrderById($orderId)
    {
        return $this->orderModel->with('books', 'payment', 'user')->findOrFail($orderId);
    }

    public function getAll()
    {
        return $this->orderModel->with('books', 'payment', 'user')->paginate(10);
    }
}
