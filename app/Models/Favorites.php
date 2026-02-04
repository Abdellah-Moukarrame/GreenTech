<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    public function Utilisateur(){
        return $this->hasMany(Utilasateures::class,'user_id');
    }
    public function Products(){
        return $this->hasMany(Product::class,'product_id');
    }
    protected $fillable = ['id','user_id','product_id'];
}
