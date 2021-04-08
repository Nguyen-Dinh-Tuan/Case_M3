<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    use HasFactory;
    protected $fillable = ['id','description','img'];

    public function Product()
    {
        return $this->hasMany(Product::class, 'productline');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
    public $incrementing = false;
}
