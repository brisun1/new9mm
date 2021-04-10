<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Contract extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}
