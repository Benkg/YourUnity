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
          // $table->increments('id');
          $table->string('firedb_id');
          $table->string('name')->default('NULL');
          $table->string('avatar')->default('default.jpg');
          $table->rememberToken();
          $table->timestamps();

          $table->primary('firedb_id');
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
