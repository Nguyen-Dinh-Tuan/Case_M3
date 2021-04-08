<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductLine;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        return view('frontend.shop',compact('products'));
    }

    public function showProductline($id)
    {
        $productline = ProductLine::where('id', '=', $id)->select('*')->first();
        $des1 = html_entity_decode($productline->description);
        $product = Product::where('productLine',$productline->id)->paginate(4);
        return view('frontend.showproductline', compact('productline','des1','product'));
    }

    public function showProduct($id)
    {

        $product = Product::where('id', '=', $id)->select('*')->first();
        $des1 = html_entity_decode($product->description);
        return view('frontend.showproduct', compact('product', 'des1'));
    }

    public function show($id){
        $productlines = ProductLine::where('id',$id)->first();
        $product = Product::where('productLine',$productlines->id)->get();
        return view('frontend.productline',compact('product'));
    }

    public function indexMaster()
    {
        $productline = ProductLine::paginate(3);
        return view('frontend.index',compact('productline'));
    }

}
