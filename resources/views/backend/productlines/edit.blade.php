@extends('backend.layouts.master')
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body col-lg-6">
            <form method="post" action="{{ route('productlines.store', $productline->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{ $productline->id }}" type="text" name="id" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input value="{{ $productline->description }}" type="text" name="description" class="form-control">

                </div>
                <div class="form-group">
                    <label>Image</label>
                    <img style="width: 400px;height: 200px" class="img-thumbnail img-fluid" src="{{asset ('storage/'.$productline->img)}} " alt="">
                    <input type="file" name="img" class="form-control">
                    <input style="width: 100px" type="hidden" class="form-control" value="{{ $productline->img }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
