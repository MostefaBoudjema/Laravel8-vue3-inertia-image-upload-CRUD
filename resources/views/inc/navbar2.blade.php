<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
       

 
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="nav-link" href="{{route('products.index')}}">Product <span class="sr-only">(current)</span></a> </li>   
                    <li><a class="nav-link" href="{{route('mus.index')}}">Mostfa <span class="sr-only">(current)</span></a> </li>   
                    <li><a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a></li>  
                            
                </ul>    
            </div>

            <ul class="nav navbar-nav navbar-right">
                
            <li ><h1 style="font-family:'Times New Roman',  Times, serif; font-weight:bolder; color:white; font-size:20px; text-transform:uppercase">
            LARAVEL 8 CRUD - NAVBAR2
            </h1></li>            
            </ul>

    </div>
</nav>