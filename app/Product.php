<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['product_code', 'name', 'category_id', 'price', 'description', 'image', 'publish'];    

    public function category() {

    	return $this->belongsTo('App\Category');
    }

    public function imageProducts() {

    	return $this->hasMany('App\ImageProduct');
    }
}
