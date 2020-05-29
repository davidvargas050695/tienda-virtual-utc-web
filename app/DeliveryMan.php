<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    protected $table='delivery_men';

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

}
