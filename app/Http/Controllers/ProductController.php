<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(7);
        return view('backend.products.list', compact('products'));
    }

    public function create()
    {
        $product = ProductLine::all();

        return view('backend.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product-> productName = $request->input('productName');
        $product-> productLine = $request->input('productLine');
        $product-> descripton = $request->input('descripton');
        $product-> quantity = (integer)$request->input('quantity');
        $product-> price = (float)$request->input('price');
        $product-> voucher = (float)$request->input('voucher');

        $file = $request->inputFile;
        if (!$request->hasFile('inputFile')) {
            $product->img = $file;
        } else {
            $file = $request->file('inputFile');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputName;
            $newFileName = "$fileName.$fileExtension";
            $request->file('inputFile')->storeAs('public/images', $newFileName);
            $product->img = $newFileName;
        }
        $product->save();

        return redirect()->route('products.list')->with('message','Them moi sap pham thanh cong ');


    }

//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $productline = ProductLine::all();
        return view('backend.products.edit', compact('product','productline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $product = Product::find($id);

        $product->productName = $request->input('productName');
        $product->productLine = $request->input('productLine');
        $product->descripton = $request->input('descripton');

        $product->quantity = (integer)$request->input('quantity');
        $product->price = (float)$request->input('price');
        $product->voucher = (float)$request->input('voucher');


//        dd(storage_path('app/public/images/'.$request->imgName));
        if (!$request->hasFile('img') && file_exists(storage_path('app/public/images/'.$request->imgName))) {
            $product->img = $request->imgName;
        } else {
            if (file_exists(storage_path('app/public/images/'.$request->imgName))) {
                unlink(storage_path('app/public/images/'.$request->imgName));
            }
            $imageName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->file('img')->storeAs('public/images', $imageName);
            //$request->img->move(storage_path('storage/app/public/images'), $imageName);
            $product->img = $imageName;
        }
        $product->save();
        return redirect()->route('products.list')->with('message','Cap nhap san pham thanh cong ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->orders()->detach();
        $product->delete();
        return redirect()->route('products.list')->with('error','Xoa thanh cong');
    }

    public function show(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return view("backend.products.show", compact('product'));
    }



    public function search(Request $request)
    {
        $search = $request->input('keyword');
        if(!$search){
            return redirect()->route('products.list');
        }

        $products = DB::table('products')
            //->where('productName', 'like', '%'.$search.'%')->get();
            ->where('productName','like','%'.$search.'%')
            ->orWhere('productLine','like','%'.$search.'%')
            ->paginate(7);
        $productline = ProductLine::all();
        Session::flash('search_result',true);
        return view('backend.products.list',compact('products','productline'));
    }
}
