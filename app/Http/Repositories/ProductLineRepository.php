<?php


namespace App\Http\Repositories;


use App\Models\ProductLine;

class ProductLineRepository
{
 function getAll()
 {
     return ProductLine::orderBy('id', 'DESC')->paginate(5);
 }

 function findById($id)
 {
     return ProductLine::findOrFail($id);
 }

 function store($productline)
 {
  $productline->save();
 }

    function delete($productline)
    {
        $productline->delete();
    }
}
