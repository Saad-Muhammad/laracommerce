@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-transparent text-center">Create A New Product</div>

    <div class="card-body">
        <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Enter Product Name">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="text" name="price" class="form-control" value="{{ old('price')}}" placeholder="Enter Product Price">
            </div>

            <div class="form-group">
                <label for="content">Add Description</label>
                <textarea name="description" id="description" cols="30" placeholder="Enter Product Description" rows="10" class="form-control">{{ old('content')}}</textarea>
            </div>

            <div class="form-group  d-flex justify-content-center">
                <button class="btn btn-success" type="submit"> Create Product </button>
            </div>

        </form>
    </div>
</div>

@endsection
