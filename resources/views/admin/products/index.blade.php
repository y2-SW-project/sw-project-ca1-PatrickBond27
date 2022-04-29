@extends('layouts.appadmin')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Products
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">Add</a>
          </div>
          <div class="card-body">
            @if (count($products)=== 0)
              <p>There are no Products!</p>
            @else
            <table id="table-products" class="table table-hover">
                <thead>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Weight</th>
                  <th>Price</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr data-id="{{ $product->id }}">
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->weight }}</td>
                      <td>{{ $product->price }}</td>

                      <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-default">View</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                          <button type="submit" class="form-cotrol btn btn-danger">Delete</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection