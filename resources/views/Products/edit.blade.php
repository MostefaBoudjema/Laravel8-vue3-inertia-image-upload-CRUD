@extends('layouts.app')

@section('title', 'Product Edit '.$Product->product_title)

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
      <div class="card-head bg-dark">
      <a href="{{route('products.index')}}"><button class="btn btn-dark pull-right">Back</button></a>
    <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; color:white; text-align:center"><b style="color:red">edit </b> {{ $Product->product_title }}</h1><hr>
      </div>
      <div class="card-body">

    <form method="POST" action="{{ route('products.update', $Product->id) }}" enctype="multipart/form-data">
     @csrf
     @method('PATCH') 

     <div class="form-row">
       <div class="col-md-6">
         <label for="product-title">Product Title</label>
         <input type="text" name="product_title" 
                value="{{$Product->product_title }}" class="form-control" id="product_title">
               </div>
               <div class="col-md-6">  
                 <label for="product-name">Product Name</label>
                 <input type="text" name="product_name" 
                 value="{{$Product->product_name }}" class="form-control" id="product_name">
         </div>
       </div>

     <div class="form-row">
      <div class="col-md-6"> 
        <label for="product-code">Product Code</label>
          <input type="text" name="product_code" 
                 value="{{ $Product->product_code}}" class="form-control" id="product_code">
    </div>
       <div class="col-md-6"> 
       <label for="product-price">Product Price</label>
       <input type="text" name="product_price" 
              value="{{ $Product->product_price }}" class="form-control" id="product_price">
   </div>
</div>
     <div class="form-group">
         <label for="product-description">Product Description</label>
         <textarea name="product_description" class="form-control" id="product_description" rows="3">{{$Product->product_description}}</textarea>
     </div>
     <div class="form-group">
         <label for="product-image">Product Image</label>
          <input type="hidden"  name="product_image" value="{{$Product->product_image}}">
         <input type="file" name="product_image" 
                class="form-control" id="product_image">
                <p><img src="{{asset('Product/' . $Product->product_image) }}" width="80px" height="50" alt=""></p>
     </div>
        
        <button type="submit" class="btn btn-dark">Update Product</button>
    </form>
</div>
</div>
@endsection