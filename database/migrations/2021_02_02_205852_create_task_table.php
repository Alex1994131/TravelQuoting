<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('itinerary_id');
          $table->integer('service_id');
          $table->string('reference_number');
          $table->string('task_name');

          $table->integer('task_type');
          $table->integer('customer');
          $table->longtext('task_des');
          $table->integer('assigned_by');
          $table->integer('assigned_to');

          $table->string('start_date');
          $table->string('start_time');
          $table->string('end_date');
          $table->string('end_time');
          $table->integer('priority');
          $table->integer('status');
          $table->string('tags');

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
        Schema::dropIfExists('task');
    }
}
