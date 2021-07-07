<?php
namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $orderRepo;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepo = $orderRepository;
    }

    public function saveOrder($request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total_money = session()->get('cart')->totalPrice;
        $order->total_quantity = session()->get('cart')->totalQuantity;
        $order->display_name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->payment_id = $request->payment_id;
        $order->status = 'Pending';
        $this->orderRepo->saveOrder($order);
    }

    public function findOrderById($orderId)
    {
        return $this->orderRepo->findOrderById($orderId);
    }
}
