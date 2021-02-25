<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ItineraryDaily extends Model
{
    //
    protected $table = 'itinerary_daily';
    protected $primaryKey = 'id';

    public function get_product() {
      $product = Product::find($this->product_id);
      return  $product;
    }
    public function get_time(){
      $time = $this->date . ' ' . $this->start_time . ' ~ ' . $this->end_time;
      return $time;

    }
    public function get_product_prices(){
      $price_ids = explode(':', $this->product_price_id);
      $product_prices = collect([]);
      foreach($price_ids as $price_id)
      {
        $product_prices->push(ProductPricing::find($price_id));
      }

      return $product_prices;

    }
    public function confirm_check(){
      $confirmation = Confirmation::where('itinerary_daily_id', $this->id)->where('flag', 1)->first();
      return $confirmation;
    }
}
