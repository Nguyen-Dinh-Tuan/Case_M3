<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderDate','requiredDate','shippedDate','status','customerNumber'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerNumber');
    }

    public function Product(){
        return $this->belongsToMany(Product::class,'orderdetails','orderNumber','productCode');
    }
    public function usesTimestamps():bool
    {
        return false;
    }
}
