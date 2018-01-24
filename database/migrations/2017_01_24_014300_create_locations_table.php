<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('locations', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->integer('user_id')->unsigned();
          $table->integer('location_id')->unsigned();

          $table->string('address');
          $table->string('city');
          $table->string('state');
          $table->string('country');
          $table->string('postal_code');

          $table->float('latitude', 10, 7);
          $table->float('longitude', 10, 7);

          $table
              ->primary(array('user_id', 'location_id'));
          $table
              ->foreign('user_id')
              ->references('id')
              ->on('users');
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
      Schema::dropIfExists('locations');
      Schema::enableForeignKeyConstraints();
    }
}
