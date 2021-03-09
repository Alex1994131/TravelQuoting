<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Confirmation extends Model
{
    protected $table = 'confirm_check';
    protected $primaryKey = 'id';

    protected $fillable = ["id", "itinerary_daily_id", "task_id", "product_id", "flag", "status"];

    public function get_product() {
        $product = Product::find($this->product_id);
        return  $product;
    }

    public function get_time() {
        $time = $this->get_itinerary_daily()->date . ' ' . $this->get_itinerary_daily()->start_time . ' ~ ' . $this->get_itinerary_daily()->end_time;
        return $time;
    }

    public function get_product_prices(){
        $price_ids = explode(':', $this->get_itinerary_daily()->product_price_id);
        return $price_ids;
    }

    public function get_product_seasons(){
        $price_seasons = explode(':', $this->get_itinerary_daily()->product_price_season);
        return $price_seasons;
    }

    public function get_product_tags() {
        $price_tags_arr = explode(':', $this->get_itinerary_daily()->product_price_tag);
        $price_tags = array();
        for($i=0; $i<count($price_tags_arr); $i++) {
            $temp = CategoryTag::find($price_tags_arr[$i])->title;
            array_push($price_tags, $temp);
        }
        return $price_tags;
    }

    public function get_product_currencies() {
        $price_currs_arr = explode(':', $this->get_itinerary_daily()->product_price_currency);
        $price_currs = array();
        for($i=0; $i<count($price_currs_arr); $i++) {
            $temp = Currency::find($price_currs_arr[$i])->title;
            array_push($price_currs, $temp);
        }
        return $price_currs;
    }

    public function get_itinerary_daily() {
        $daily = ItineraryDaily::find($this->itinerary_daily_id);
        return $daily;
    }
}
