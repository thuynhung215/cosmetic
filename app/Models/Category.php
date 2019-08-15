<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $fillable = ['name'];
    public function product() {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}
