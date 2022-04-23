@extends('layouts.app')
<nav class="navbar navbar-expand-md navbar-light nav-color border-top shadow-sm">
    <div class="container">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/user/products') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kitchen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Office</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Garden</a>
            </li>
        </ul>
    </div>
</nav>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- This is the home page for the ordinary user -->
                    You are logged in as an Ordinary user! <a href="{{ route('user.products.index')}}"> View All Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
