<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productName','productLine','description','quantity','price','img'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderdetails', 'productCode', 'orderNumber');
    }

    public function ProductLine()
    {
        return $this->belongsTo(ProductLine::class,'productLine');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
