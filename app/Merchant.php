<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
