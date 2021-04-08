<?php


namespace App\Http\Services;


use App\Http\Repositories\OrderRepository;
use App\Models\Order;

class OrderService
{
   protected $orderRepo;
   public function __construct(OrderRepository $orderRepo)
   {
       return $this->orderRepo = $orderRepo;
   }

    function getAll()
    {
        return $this->orderRepo->getAll();
    }

    function store($request)
    {
        $order = new Order();
        $order->fill($request->all());

    }

    function getById($id)
    {
        return $this->orderRepo->findById($id);
    }


    function update($request, $id)
    {
        $order = $this->orderRepo->findById($id);
        $order->fill($request->all());
        $this->orderRepo->store($order);
    }

}
