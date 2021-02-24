<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSolfDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('bonus_discips', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('calendars', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('department__joins', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('departments', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('regencies', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('sent_forms', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('statists', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            //
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
