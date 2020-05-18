<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'id_sub_category');
    }
}
