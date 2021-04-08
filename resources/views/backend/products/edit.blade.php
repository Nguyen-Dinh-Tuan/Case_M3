@extends('backend.layouts.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h1>Chỉnh sửa sản phẩm</h1>
            </div>
            <div class="col-md-8">
                <form method="post" action="{{ route('products.update', $product->id) }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="productName" value="{{ $product->productName }}">
                    </div>
                    <div class="form-group">
                        <label>Dòng sản phẩm</label>
                        <select class="form-control" name="productLine">
                            @foreach($productline as $value)
                                <option value="{{ $value->id }}">{{ $value->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Số lượng </label>
                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div class="form-group">
                        <label>Giá </label>
                        <input  type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label>Mã giảm giá</label>
                        <input type="number" class="form-control" name="voucher" value="{{ $product->voucher }}">
                    </div>
                    <div>
                        <img style="width: 400px;height: 300px" class="img-thumbnail img-fluid" src="{{asset ('storage/images/'.$product->img)}} " alt="">
                        <input type="file" name="img" class="form-control">
                        <input type="hidden" name="imgName" class="form-control" value="{{ $product->img }}">
                        @if($errors->any())
                            <p class="alert-danger my-sm-4">{{ $errors->first('img') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mô tả </label>
                        <textarea style="height: 200px" class="form-control" name="descripton" >{{ $product->descripton }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>

@endsection
