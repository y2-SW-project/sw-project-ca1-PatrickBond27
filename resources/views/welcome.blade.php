@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Electrimal.

                    Read more <a href="{{ route('about') }}"> about us </a>
                    <img src="{{ asset('storage/images/appliance shop.jpg') }}" class="center" width="800px">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
