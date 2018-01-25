<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('attendees', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          
          $table->increments('id');
          $table->string('firedb_id')->unique()->nullable();

          $table->string('email')->unique();
          $table->string('name_first')->nullable();
          $table->string('name_last')->nullable();
          $table->string('gender')->nullable();
          $table->string('avatar')->default('default.jpg');

          $table->integer('birth_year')->nullable();
          $table->integer('birth_month')->nullable();
          $table->integer('birth_day')->nullable();

          $table->rememberToken();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('attendees');
        Schema::enableForeignKeyConstraints();
    }
}
