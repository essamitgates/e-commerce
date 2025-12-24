<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    //
    protected $fillable = ['product_id', 'photo_url'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
