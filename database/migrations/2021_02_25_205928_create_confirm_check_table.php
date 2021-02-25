<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_check', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('itinerary_daily_id');
          $table->integer('task_id');
          $table->integer('product_id');
          $table->integer('flag');
          $table->integer('status');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm_check');
    }
}
