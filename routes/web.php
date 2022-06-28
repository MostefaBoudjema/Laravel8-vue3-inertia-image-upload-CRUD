<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('Product');
// });

Route::get('/', function () {
        return redirect('/products');
});
Route::get('login', function () {
        return redirect('/products');
});

Route::resource('products', 'ProductController');
// Route::resource('mus', 'MostfaController');
// Route::resource('mostfa', 'MostfaController');
