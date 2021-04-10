<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escorth extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
