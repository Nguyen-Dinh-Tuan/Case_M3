<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        return $this->customerService = $customerService;
    }

    function index()
    {
        $customers = $this->customerService->getAll();

        return view('backend.customers.list', compact('customers'));
    }


    public function destroy($id)
    {
        $cutomers = Customer::find($id);
        $cutomers->delete();
        return redirect()->route('customers.index');
    }

}
