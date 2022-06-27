@extends('layouts.app')
@section('title', 'Laravel 7 Crud')
@section('content')
  {{-- <a href="{{ route('products.create') }}" class="btn btn-dark">Creat New Product</a> --}}

  <div class="card">
    <div class="card-head bg-dark">
      <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:28px; margin: 10px; color:white; text-align:center">
      Products List </h1>
    </div>

    <div class="card-content">
        {{-- <div class="card-body">         --}}
          <table class="table table-striped mt-3">
            <thead>
              <tr>
                <th scope="col">SN <sup>o</sup></th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Price</th>
                <th scope="col">Operation</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($Products as $key => $Product)
              <tr>
                <th scope="row">{{ $key+1}}</th>
                <td><img src="{{ asset('Product/' .$Product->product_image) }}" alt="" style="width:70px; height:30px"></td>
                <td>{{ $Product->product_title }}</td>
                <td>{{ $Product->product_name}}</td>
                <td>{{ $Product->product_code}}</td>
                <td><i class="fa fa-usd"></i> {{ $Product->product_price}}</td>
                <td>{{ $Product->product_description }}</td>
                <td class="table-buttons">
                  <a href="{{ route('products.show', $Product->id) }}" class="btn btn-info">
                    <i class="fa fa-tag"></i>
                  </a>
                  <a href="{{ route('products.edit', $Product->id) }}" class="btn btn-success">
                    <i class="fa fa-edit" ></i>
                  </a>
                  <form method="POST" action="{{ route('products.destroy', $Product->id) }}">
                  @csrf
                  @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-remove"></i>
                      </button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        {{-- </div> --}}
      </div>
    <div class="card-footer bg-dark">
      {{$Products->links()}}
    </div>
  </div>
@endsection