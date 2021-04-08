@extends('backend.layouts.master')
@section('content')

    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h1>Thêm mới sản phẩm </h1>
            </div>
            <div class="col-md-8">
                <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm </label>
                        <input type="text" class="form-control" name="productName"  placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Dòng sản phẩm </label>
                        <select class="form-control" name="productLine">
                            @foreach($product as $value)
                                <option value="{{ $value->id }}">{{ $value->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Số lượng </label>
                        <input type="number" class="form-control" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label>Phần trăm giảm giá</label>
                        <input type="text" class="form-control" name="voucher" placeholder="Enter voucher">
                    </div>
                    <div class="form-group col-sm-6">
                        <div class="card">
                            <img style="height: 200px; object-fit: cover" id="output" class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" onchange="loadFile(event)" id="inputFile" name="inputFile">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="descripton" class="form-control" style="height: 200px" placeholder="Enter descripton"></textarea>
                        {{--                        <input type="text" class="form-control" name="descripton" placeholder="Enter descripton"/>--}}
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection

