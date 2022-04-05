@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Products
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
                        <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-primary">View</a>
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
