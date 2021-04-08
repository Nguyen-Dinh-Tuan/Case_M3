@extends('backend.layouts.master')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2>Danh Sách Sản Phẩm</h2>
            </div>
            <div class="col-12">
            <a  class="btn btn-primary" href="{{route('products.create')}}"><i class="bi bi-bag-plus-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                </svg></a></div>
            <table class="table table-striped "  style="vertical-align: baseline;text-align: center" >
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name </th>
                    <th scope="col">Image</th>
                    <th scope="col">ProductLine</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <td scope="row">{{ $key + $products ->firstItem() }}</td>
                        <td>
                            <a href="{{route('products.id',$product->id)}}">{{$product->productName }}</a>
                        </td>

                        <td>
                            <img src="{{asset ('storage/images/'.$product->img)}} " alt="product-img" height="32">
                        </td>
                        <td>{{$product->productLine }}</td>
                        <td> {!!substr($product->descripton, 0, 50) !!}  ...</td>
                        <td>{{$product->quantity }}</td>
                        <td>{{ number_format($product->price)}}</td>

                        <td>{{$product->voucher}}</td>
                        <td>
                            <a style="margin: 5px" href="{{ route('products.edit', $product->id) }}" ><i class="bi bi-pencil-fill  "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg></i>
                            </a>
                            <a style="" href="{{ route('products.delete', $product->id) }}"
                               onclick="return confirm('Bạn chắc chắn muốn xóa san pham: {{ $product->productName }}' )"><i class="bi bi-trash  "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div style="float: right;">{{ $products->links( "pagination::bootstrap-4") }}</div>
        </div>
    </div>

@endsection
