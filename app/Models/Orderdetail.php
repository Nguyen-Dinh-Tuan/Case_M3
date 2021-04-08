<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','price'];

    public function Order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'productCode');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
