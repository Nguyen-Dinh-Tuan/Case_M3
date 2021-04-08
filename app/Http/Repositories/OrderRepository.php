<?php


namespace App\Http\Repositories;


use App\Models\Order;

class OrderRepository
{
  function getAll()
  {
      return Order::paginate(3);
  }

    function findById($id)
    {
        return Order::findOrFail($id);
    }

    function store($order)
    {
        $order->save();
    }

    function delete($order)
    {
        $order->delete();
    }

}
