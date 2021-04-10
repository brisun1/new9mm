<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [


        'name', 'ucountry','utype','email', 'password','username'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*
    public function posts(){
        return $this->hasMany('App\Post');
    }
    ****/
    public function misss(){
        return $this->hasMany('App\Models\Miss');
    }
    public function ptmisss(){
        return $this->hasMany('App\Models\Ptmiss');
    }
    public function massages(){
        return $this->hasMany('App\Models\Massage');
    }
    public function contracts(){
        return $this->hasMany('App\Models\Contract');
    }
    public function mores(){
        return $this->hasMany('App\Models\More');
    }
    public function baoyangs(){
        return $this->hasMany('App\Models\Baoyang');
    }
    public function escorths(){
        return $this->hasMany('App\Models\Escorth');
    }
    public function escortbs(){
        return $this->hasMany('App\Models\Escortb');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
