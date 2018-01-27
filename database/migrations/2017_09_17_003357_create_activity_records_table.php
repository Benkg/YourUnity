<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('activity_records', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('event_id')->unsigned();
          $table->string('attendee_id');

          $table->string('group_name')->nullable();

          $table->bigInteger('check_in_time')->unsigned();
          $table->tinyInteger('check_in_method')->unsigned()->default(2);
          $table->bigInteger('duration')->unsigned()->default(0);
          $table->integer('activity_status')->unsigned();

          $table->timestamps();

          $table
              ->foreign('user_id')
              ->references('id')
              ->on('users');
          $table
              ->foreign('event_id')
              ->references('id')
              ->on('events');
          $table
              ->foreign('attendee_id')
              ->references('firedb_id')
              ->on('attendees');
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
        Schema::dropIfExists('activity_records');
        Schema::enableForeignKeyConstraints();
    }
}
