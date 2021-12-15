@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-transparent text-center">All Products</div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img src="{{asset($product->image)}}" width="50px" height="50px" alt="{{ $product->name }}">
                                </td>

                                <td>
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->price }}
                                </td>

                                <td>
                                    {{ str_limit($product->description , 20) }}
                                </td>
                                <td>
                                <a href="{{route('products.edit', ['product' => $product->id ])}}" class="btn btn-info btn-sm">Edit</a>
                                </td>

                                <td>
                                    <form action="{{route('products.destroy', ['product' => $product->id ])}}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger btn-sm"> Delete</button>


                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
