<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;
use App\Models\Customer;

class CustomerService
{
   protected $customerRepo;

   public function __construct(CustomerRepository $customerRepo)
   {

       return $this->customerRepo = $customerRepo;
   }

   function getAll()
   {
       return $this->customerRepo->getAll();
   }

   function getById($id)
   {
       return $this->customerRepo->findById($id);

   }

   function store($request)
   {
       $customer = new Customer();
       $customer->fill($request->all());
       $this->customerRepo->store($customer);
   }
  function update($request, $id)
  {
      $customer = $this->customerRepo->findById($id);
      $customer->fill($request->all());
      $this->customerRepo->store($customer);
  }

}
