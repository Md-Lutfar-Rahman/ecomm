@extends('frontend.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('path/to/product/image.jpg') }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>Description: {{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <!-- Additional product details here -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
