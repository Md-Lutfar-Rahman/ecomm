@extends('frontend.layouts.app')

@section('content')
<div class="container">
    @if($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    @if($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Add your additional content for the placeOrder page here -->
</div>
@endsection
