@extends('frontend.layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Checkout</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    @if (!empty($cartItems))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td>{{ $cartItem->product->name }}</td>
                                    <td>${{ $cartItem->product->price }}</td>
                                    <td>{{ $cartItem->quantity }}</td>
                                    <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><strong>Total Price</strong></td>
                                    <td><strong>${{ $totalPrice }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info" role="alert">
                        Your cart is empty.
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Shipping Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('place.order') }}" method="POST">
                        @csrf
                        <!-- Hidden input fields for cart_id and user_id -->
                        @if (!$cartItems->isEmpty())
                        <input type="hidden" name="cart_id" value="{{ $cartItems->first()->id }}">
                        <input type="hidden" name="user_id" value="{{ $cartItems->first()->user_id }}">
                        @endif

                        <!-- Input fields for quantities and product IDs -->
                        @foreach ($cartItems as $cartItem)
                        <input type="hidden" name="product_ids[]" value="{{ $cartItem->product->id }}">
                        <input type="number" name="quantities[]" value="{{ $cartItem->quantity }}" min="1">
                        @endforeach

                        <!-- Additional fields for shipping, billing, etc. -->

                        <div class="form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="billing_address">Billing Address</label>
                            <textarea class="form-control" id="billing_address" name="billing_address" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="shipping_method">Shipping Method</label>
                            <input type="text" class="form-control" id="shipping_method" name="shipping_method" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <input type="text" class="form-control" id="payment_method" name="payment_method" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
