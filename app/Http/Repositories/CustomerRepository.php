<?php


namespace App\Http\Repositories;


use App\Models\Customer;

class CustomerRepository extends Repository
{
   function getAll()
   {
       return Customer::all();

   }

   function findById($id)
   {
       return Customer::findOrFail($id);
   }

   function store($customer)
   {
       $customer->save();

   }


   function delete($customer)
   {
       $customer->delete();
   }

}
