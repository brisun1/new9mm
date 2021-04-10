<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Miss extends Model
{
    use HasFactory;
    /*public function setTable($table)
    {
    $this->table = $table;
    return $this;
    }
    */
    function __construct()
    {
        parent::__construct();
        if(Auth::check()){
            $country=Auth::user()->ucountry;
        }else
        {
            $country='爱尔兰';
            
        }
        $this->setTable($country.'_miss_tbl');
    }
    
    

    /*public function __construct($table = null, $attr = [])
    {
        parent::__construct();

        
        $country='ireland';
        $this->setTable($country.'_miss_tbl');
        
    }*/
    // Table Name
    
    //protected $country="gggg";
    //protected $country=Auth::ucountry;
    
    //protected $table = $country.'posts';
    
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    //public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
