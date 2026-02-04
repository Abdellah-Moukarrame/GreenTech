<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use  Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilasateures extends Authenticatable

{

    public function Favorites(){
        return $this->belongsTo(Favorites::class);
    }
    protected $fillable = ['id','name','email','password'];
}
