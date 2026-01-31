<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    protected $fillable = ['name','description','price','category_id'];
}
