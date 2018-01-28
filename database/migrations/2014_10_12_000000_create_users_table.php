<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('name_first');
            $table->string('name_last');
            $table->string('company');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('website')->nullable();
            $table->string('phone_num')->nullable();
            $table->text('summary')->nullable();
            $table->string('avatar')->default('default.jpg');

            $table->integer('FEIN')->nullable();
            $table->integer('num_events')->default(0);
            $table->integer('num_people_events')->default(0);
            $table->tinyInteger('verified')->default(0);

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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
