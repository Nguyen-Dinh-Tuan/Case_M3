@extends('backend.layouts.master')
@section('content')
    <style>
        .card-header{
            font-size: 45px!important;
        }
        table{
            background: white!important;
        }
        td{
            font-size: 20px!important;
            color: black!important;
        }
        .img-thumbnail{
            width: 500px!important;
            height: 500px!important;
        }
        .table-responsive{
            width: 900px!important;
        }
        #text {
            display: -webkit-box;
            /*width: 300px;*/
            height: 200px;
            line-height: 25px;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;

        }
        button{
            background: #3f3f3f;
            color: white;
            font-size: 20px!important;
        }
    </style>
    <main>
        <div class="container">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Chi tiết dòng sản phẩm
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tr>
                                <td>Tên dòng sản phẩm: {{$productline->id}}</td>
                            </tr>
                            <tr>
                                <td id="text">Tên sản phẩm:
                                    @foreach($product as $val)
                                        <br/>
                                        <a href="#">
                                            {{ $val->productName }}
                                        </a>
                                    @endforeach
                                    <div style="float: right ;">{{ $product->links( "pagination::bootstrap-4") }}</div>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <img class="img-thumbnail img-fluid" src="{{ asset('storage/'.$productline->img)}} " alt="">
                                </td>
                            </tr>

                            <tr>
                                <td>Mô tả dòng sản phẩm:
                                    <p>
                                        {!! $productline->description !!}
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <button onclick="window.history.go(-1); return false;">Hủy</button>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
