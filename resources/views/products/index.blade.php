@extends('frontend.layouts.app')
<!-- For Page Title -->
	@section('title', 'Products')

<!-- For Container -->
	@section('content')
	<div class="container">
    <div class="row">


    	@if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
		@endif


        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body mx-4">
                    <img src="{{$product->image}}" alt="{{ $product->name }}" class="img-fluid ">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <!-- Add more fields as needed -->
                      <div class="d-flex justify-content-between">
                      	<a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                      </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection

