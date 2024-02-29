@extends('Admin.Layouts.admin')
@section('title','Admin || Orders')
@section('content')
<div class="container">
    <h1 class="mb-4">Orders</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Cart ID</th>
                    <th>Order Date</th>
                    <th>Product Quantity</th>
                    <th>Total Amount</th>
                    <th>Product Image</th>
                    <th>Status</th> <!-- Add new column for status -->
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->cart_id }}</td>
                    <td>{{ date('Y-m-d', strtotime($order->order_date)) }}</td>
                    <td>
                        {{ $order->quantity }}
                       
                           
                    </td>
                    <td>${{ $order->total_amount }}</td>
                    <td>  
                    <img src="{{asset(App\Models\Product::find($order->product_id)->image )}}" alt="{{App\Models\Product::find($order->product_id)->name}}" style="height:50px;width:50px">
                    </td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Order Actions">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-outline-success">Edit</a>
                            <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
