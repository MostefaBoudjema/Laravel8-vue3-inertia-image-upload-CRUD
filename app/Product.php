<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $table = "products";
        protected $fillable = [
                'product_title', 'product_name', 'product_code',
                'product_price', 'product_description', 'product_image',
        ];
}
