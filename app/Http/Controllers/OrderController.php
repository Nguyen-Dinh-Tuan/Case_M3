<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        return $this->orderService = $orderService;
    }

    function index()
    {
        $orders = $this->orderService->getAll();
        return view('backend.orders.list', compact('orders'));
    }


    function store(Request $request)
    {
        $this->orderService->store($request);

        return redirect()->route('orders.list');
    }


    function delete($id)
    {
        $order = $this->orderService->getById($id);
        $order->delete();
        return redirect()->route('orders.list');
    }

    function edit($id)
    {

        $orders = Order::all();
        $order = $this->orderService->getById($id);
        return view('backend.orders.edit', compact('order', 'orders'));

    }

    function update(Request $request, $id)
    {
        $this->orderService->update($request, $id);

        return redirect()->route('orders.list');
    }

}
