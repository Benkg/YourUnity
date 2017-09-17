<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('event_attachments', function (Blueprint $table) {
          $table->increments('id');
          
          $table->integer('event_id')->unsigned();
          $table->integer('attachment_id')->unsigned();

          $table->foreign('event_id')->references('id')->on('events');
          $table->foreign('attachment_id')->references('id')->on('attachments');
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
        Schema::dropIfExists('event_attachments');
        Schema::enableForeignKeyConstraints();
    }
}
