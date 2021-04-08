<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->user = "Nguyen DInh Tuan";
        $customer->address = "Ha Noi";
        $customer->email = "tuandinh@gmail.com";
        $customer->phone ="090383333";
        $customer->password = "123";
        $customer->save();



        $customer = new Customer();
        $customer->user = "Nguyen Hoang Long";
        $customer->address = "Ha Noi2";
        $customer->email = "tuandddinh@gmail.com";
        $customer->phone ="0902333";
        $customer->password = "12w3";
        $customer->save();

        $customer = new Customer();
        $customer->user = "Tran Hien Thao";
        $customer->address = "Tuyen Quang";
        $customer->email = "thaotran@gmail.com";
        $customer->phone ="0903833344";
        $customer->password = "12ww3";
        $customer->save();



        $customer = new Customer();
        $customer->user = "Nguyen Ngoc Ha";
        $customer->address = "Ha Noi";
        $customer->email = "hanh@gmail.com";
        $customer->phone ="0903849840";
        $customer->password = "12345";

        $customer->save();
    }
}
