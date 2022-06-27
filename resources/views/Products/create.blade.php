@extends('layouts.app')

@section('title', 'Laravel 7 Crud')

@section('content')
<div class="row">
<div class="col-lg-6 mx-auto">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <div class="card">
      <div class="card-content">
        <div class="card-head bg-dark">
          <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; color:white; text-align:center">Add New Product </h1><hr>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
               <div class="form-row">
                 <div class="col-md-6">
                   <label for="product-title">Product Title</label>
                   <input type="text" name="product_title" 
                          value="{{ old('product_title') }}" class="form-control" id="product_title">
                         </div>
                         <div class="col-md-6">  
                           <label for="product-name">Product Name</label>
                           <input type="text" name="product_name" 
                           value="{{ old('product_name') }}" class="form-control" id="product_name">
                   </div>
                 </div>
       
               <div class="form-row">
                 <div class="col-md-6"> 
                 <label for="product-price">Product Price</label>
                 <input type="text" name="product_price" 
                        value="{{ old('product_price') }}" class="form-control" id="product_price">
             </div>
             <div class="col-md-6"> 
               <label for="product-code">Product Code</label>
                 <input type="text" name="product_code" 
                        value="{{ old('product_code') }}" class="form-control" id="product_code">
           </div>
         </div>
               <div class="form-group">
                   <label for="product-description">Product Description</label>
                   <textarea name="product_description" class="form-control" id="product_description" rows="3">{{ old('product_description') }}</textarea>
               </div>
               <div class="form-group">
                   <label for="product-image">Product Image</label>
                   <input type="file" name="product_image" 
                          value="{{ old('product_image') }}" class="form-control" id="product_image">
               </div>
               <button type="submit" class="btn btn-dark">Create Product</button>
           </form>
        </div>
      </div>
    </div>
</div>
</div>
@endsection