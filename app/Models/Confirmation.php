<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Confirmation extends Model
{
    protected $table = 'confirm_check';
    protected $primaryKey = 'id';

    protected $fillable = ["id", "itinerary_daily_id", "task_id", "product_id", "flag", "status"];

}
