<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'id';


    public function get_region_title() {
      $region = Region::find($this->region_id);
      return $region->title;

    }
    public function get_country_title() {
      $country = Country::find($this->country_id);
      return $country->title;
    }

}
