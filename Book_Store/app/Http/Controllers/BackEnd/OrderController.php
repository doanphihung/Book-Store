<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\FormInfoCustomer;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function saveOrder(FormInfoCustomer $request)
    {
        $this->orderService->saveOrder($request);
        return redirect()->route('getBill');
    }

    public function getBill()
    {
        $orderId = session()->get('orderId');
        $order = $this->orderService->findOrderById($orderId);
       return view('pages.bill.bill-payment', compact('order'));

    }

    public function index()
    {
        $orders = $this->orderService->getAll();
        $totalOrder = count($orders);
        return view('backend.order.list', compact('orders', 'totalOrder'));
    }
}
