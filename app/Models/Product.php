<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //create products model
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $fillable = ['name', 'category_id', 'price', 'description', 'img'];
    public function category() {
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
