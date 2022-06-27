@extends('layouts.app')

@section('title', $Product->product_title)

@section('content')
<div class="card">
    <div class="card-head bg-dark">
    <a href="{{route('products.index')}}"><button class="btn btn-dark pull-right">Back</button></a>
  <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; color:white; text-align:center">{{ $Product->product_title }}</h1><hr>
    </div>
    <div class="card-body">
        <div class="form-row">
            <label for="" class="col-md-2"><strong>Product Title:</strong></label>
            <div class="col-md-4">
                <p>{{ $Product->product_title }}</p>
            </div>
            <label for="" class="col-md-2"><strong>Product Name:</strong></label>
            <div class="col-md-4">
                <p>{{ $Product->product_name }}</p>
            </div>
        </div>
        <div class="form-row">
            <label for="" class="col-md-2"><strong>Product Code:</strong></label>
            <div class="col-md-4">
                <p>{{ $Product->product_code }}</p>
            </div>
            <label for="" class="col-md-2"><strong>Product Price:</strong></label>
            <div class="col-md-4">
                <p><i class="fa fa-usd"></i> {{ $Product->product_price }}</p>
            </div>
        </div>
        <div class="form-row">
            <label for="" class="col-md-2"><strong>Product Description:</strong></label>
            <div class="col-md-4">
                <p>{{ $Product->product_description }}</p>
            </div>
            <label for="" class="col-md-2"><strong>Product Image:</strong></label>
            <div class="col-md-4">
                <p><img src="{{asset('Product/' . $Product->product_image) }}" width="80px" height="50" alt=""></p>
            </div>
        </div>
    </div>
</div>
@endsection