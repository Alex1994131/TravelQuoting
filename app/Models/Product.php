<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\CategoryTag;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'title', 'category', 'zip', 'country', 'city', 'state', 'position', 'street_address', 'start_time', 'end_time', 'supplier'];


    function get_supplier(){
      $supplier = Account::find($this->supplier);
      return $supplier;
    }
    function getDescription(){
        return $this->hasMany('App\Models\ProductDescription','product_id','id');
    }

    function getFirstImage() {
        return $this->hasOne('App\Models\ProductGallery','product_id','id');
    }

    function getGallery(){
        return $this->hasMany('App\Models\ProductGallery','product_id','id');
    }

    function getPrice(){
        return $this->hasMany('App\Models\ProductPricing','product_id','id');
    }

    function getCategory() {
      return $this->hasOne('App\Models\Category','id','category');
    }
    function get_category() {
      $category =Category::find($this->category);
      return $category;

  }

    function getCountry() {
        return $this->hasOne('App\Models\Country','id','country');
    }
    function get_country() {
      $country =Country::find($this->country);
      return $country;
  }

    function getCity() {
        return $this->hasOne('App\Models\City','id','city');
    }
    function get_city() {
      $city =City::find($this->city);
      return $city;
  }
}
