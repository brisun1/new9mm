<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class More extends Model
{
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
