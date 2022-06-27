@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session()->get('error'))
    <div class="alert alert-danger mt-3">
      {{ session()->get('error') }}  
    </div>
@endif

 @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; text-align:center">
        {{ session()->get('success') }} 
       </h1> 
    </div>
@endif