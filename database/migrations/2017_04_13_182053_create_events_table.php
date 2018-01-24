<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('events', function (Blueprint $table) {
           $table->engine = 'InnoDB';

           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->integer('type_id')->unsigned();
           $table->integer('location_id')->unsigned();

           $table->string('event_name');
           $table->text('event_description');

           $table->bigInteger('starts')->unsigned();
           $table->bigInteger('ends')->unsigned();
           $table->tinyInteger('time_state')->default(2);
           $table->integer('num_registered')->unsigned()->default(0);
           $table->integer('num_attended')->unsigned()->default(0);

           $table->timestamps();

           $table
              ->foreign('user_id')
              ->references('id')
              ->on('users');
           $table
              ->foreign('type_id')
              ->references('id')
              ->on('event_types');
           $table
              ->foreign(array('user_id', 'location_id'))
              ->references(array('user_id', 'location_id'))
              ->on('locations');
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
        Schema::dropIfExists('events');
        Schema::enableForeignKeyConstraints();
    }
}
