@extends('layouts.appadmin')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Product: {{ $product->name }}
          </div>
          <div class="card-body">
              <table id="table-products" class="table table-hover">
                <tbody>
                  <tr>
                      <td rowspan="8"><img src="{{ asset('storage/images/' . $product->image_location) }}" width="150"/></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>{{ $product->name }}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>{{ $product->description }}</td>
                  </tr>
                  <tr>
                    <td>Weight</td>
                    <td>{{ $product->weight}}</td>
                  </tr>
                  <tr>
                    <td>Price</td>
                    <td>{{ $product->price }}</td>
                  </tr>
                </tbody>
              </table>

              <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection