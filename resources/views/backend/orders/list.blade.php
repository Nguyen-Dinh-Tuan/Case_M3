@extends('backend.layouts.master')
@section('content')
    <style>

        td{
            color: black!important;
            text-align: center!important;


        }
        th{
            color: black!important;
            text-align: center!important;


        }

    </style>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh sách hóa đơn</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày đặt hàng </th>
                    <th scope="col"> Ngày giao hàng </th>
                    <th scope="col">Ngày nhận hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key => $order)
                    <tr>
                        <th scope="row">{{ $key  + $orders->firstItem()  }}</th>
                        <td>{{ $order->customer()->first()->user}}</a></td>
                        <td>{{ $order->orderDate }}</td>
                        <td>{{ $order->requiredDate }}</td>
                        <td>{{ $order->shippedDate }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-info">Sửa</a>
                            <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="float: right;">{{ $orders->links( "pagination::bootstrap-4") }}</div>

        </div>
    </div>
@endsection
