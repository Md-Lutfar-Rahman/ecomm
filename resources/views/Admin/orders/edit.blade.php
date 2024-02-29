@extends('admin.layouts.admin')
@section('title','Admin || Edit Orders')
@section('content')
<div class="container">
    <h1>Edit Order</h1>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option  selected=1 disabled = 1>Painding</option>
                <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
                <option value="Confirmed" {{ $order->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Shipped" {{ $order->status === 'Shipped' ? 'selected' : '' }}>Shipped</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
    <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete Order</button>
    </form>
</div>
@endsection
