<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('activity_record', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('event_id')->unsigned();
          $table->integer('attendee_id')->unsigned();
          $table->integer('check_in_time')->unsigned();
          $table->integer('duration')->unsigned()->default(0);
          $table->integer('activity_status')->unsigned();
          $table->timestamps();

          $table->foreign('event_id')->references('id')->on('events');
          $table->foreign('attendee_id')->references('id')->on('attendees');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('activity_record');
        Schema::enableForeignKeyConstraints();
    }
}
