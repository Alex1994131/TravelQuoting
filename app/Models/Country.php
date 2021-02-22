<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'id';

    public function get_region_title() {
      $region = Region::find($this->region_id);
      return $region->title;

    }

}
