<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationIdToActivityRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ //We will use this org_id when we setup a junction table with allowable organizations
    public function up()
    {
        Schema::table('activity_records', function (Blueprint $table) {
            $table->integer('organization_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_records', function (Blueprint $table) {
            //
        });
    }
}
