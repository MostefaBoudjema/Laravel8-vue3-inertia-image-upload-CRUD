<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return redirect('/products');
});
Route::get('login', function () {
        return redirect('/products');
});

Route::resource('products', 'ProductController');
