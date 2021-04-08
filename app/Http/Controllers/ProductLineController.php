<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductLineService;
use App\Models\Product;
use App\Models\ProductLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductLineController extends Controller
{
    protected $productlineService;
    public function __construct(ProductLineService $productlineService)
    {
        return $this->productlineService = $productlineService;
    }

    function index()
    {
        $productlines = $this->productlineService->getAll();
        return view('backend.productlines.list', compact('productlines'));
    }

    function create()
    {
        $productline = ProductLine::all();
        return view('backend.productlines.add' , compact('productline'));
    }

    function store(Request $request)
    {
        $this->productlineService->store($request);

        return redirect()->route('productlines.index')->with('message','Them moi thanh cong');
    }


    function delete($id)
    {
        $productline = $this->productlineService->getById($id);
        Storage::disk('public')->delete($productline->img);
        $productline->delete();
        return redirect()->route('productlines.index')->with('error', 'Xoa thanh cong');
    }

    function edit($id)
    {

        $productlines = ProductLine::all();
        $productline = $this->productlineService->getById($id);
        return view('backend.productlines.edit', compact('productline', 'productlines'));

    }

    function update(Request $request, $id)
    {
        $this->productlineService->update($request, $id);

        return redirect()->route('productlines.index')->with('message','Cap nhat thanh cong');
    }



    public function show(Request $request)
    {
        $productline = ProductLine::findOrFail($request->id);
//        $product = $this->pr
        $product =  Product::where('productLine',$productline->id)->paginate(5);
        return view("backend.productlines.show", compact('product','productline'));
    }
}
