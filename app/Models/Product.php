<?php

namespace App\Models;

use App\Models\ProductPhoto;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description', 'category_id'];

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }
}
