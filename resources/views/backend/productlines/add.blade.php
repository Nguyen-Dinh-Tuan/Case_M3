@extends('backend.layouts.master')
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body col-lg-6">
            <form method="post" action="{{ route('productlines.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{ old('id') }}" type="text" name="id" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input value="{{ old('description') }}" type="text" name="description" class="form-control">

                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input value="{{ old('img') }}" type="file" name="img" class="form-control ">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
