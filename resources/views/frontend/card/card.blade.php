@extends('frontend.layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Your Shopping Cart</h1>

    @if (empty($cartItems))
    <div class="alert alert-info" role="alert">
        Your cart is empty.
    </div>
    @else
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Cart Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $index => $cartItem)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cartItem->product->name }}</td>
                                    <td>${{ $cartItem->product->price }}</td>
                                    <td>{{ $cartItem->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <p>Total Price: ${{ $totalPrice }}</p>
                    <a href="{{route('checkout')}}" class="btn btn-primary btn-lg btn-block">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
