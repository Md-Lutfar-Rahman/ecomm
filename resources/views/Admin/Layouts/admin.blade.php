<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .product-table {
            border: 2px solid #dee2e6; /* Border color */
            background-color: #f8f9fa; /* Background color */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img width="42" height="42" src="https://img.icons8.com/flat-round/64/back--v1.png" alt="back--v1"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item" ><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="list-group-item" ><a href="{{ route('admin.products') }}">Products</a></li>
                    <li class="list-group-item"> <a href="{{ route('admin.orders') }}">Orders</a></li>
                    <li class="list-group-item"> <a href="{{ route('admin.course') }}">Course</a></li>
                    <li class="list-group-item"> <a href="{{ route('admin.lesson') }}">Lessons</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
  

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
