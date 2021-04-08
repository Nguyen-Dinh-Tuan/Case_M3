@extends('backend.layouts.master')
@section('content')
    <style>
        td{
            color: black!important;

        }
        th{
            color: black!important;

        }
        input{
            width: 400px!important;
        }
        #status{
            width: 400px !important;

        }
        select {
            width: 400px !important;
        }
    </style>

    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Chỉnh sửa hóa đơn</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        <div class="form-group">
                            <label> Ngày đặt hàng </label>
                            <input type="date" class="form-control" name="orderDate" value="{{ $order->orderDate }}">
                        </div>
                        <div class="form-group">
                            <label>Yêu cầu đặt hàng</label>
                            <input type="date" class="form-control" name="requiredDate" value="{{ $order->requiredDate }}">
                        </div>
                        <div class="form-group">
                            <label>Ngày vận chuyển</label>
                            <input type="date" class="form-control" name="shippedDate" value="{{ $order->shippedDate }}">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái </label>
                            <select name="status" id="status">
                                <option value="Đã xác minh">Đã xác minh</option>
                                <option value="Đã giao cho bên vận chuyển">Đã giao cho bên vận chuyển</option>
                                <option value="Đang giao">Đang giao</option>
                                <option value="Đã nhận hàng">Đã nhận hàng</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
