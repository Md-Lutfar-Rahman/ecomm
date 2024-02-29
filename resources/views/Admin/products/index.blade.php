@extends('Admin.Layouts.admin')
@section('title','Admin || Products')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a class="btn btn-primary m-2" href="{{route('admin.products.create')}}" >Add new Product</a>
            <table class="table product-table">
                <thead class="table-light">
                    <tr>
                        <th>SL</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid"></td>
                        <td><a href="{{ route('products.edit', $product->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection