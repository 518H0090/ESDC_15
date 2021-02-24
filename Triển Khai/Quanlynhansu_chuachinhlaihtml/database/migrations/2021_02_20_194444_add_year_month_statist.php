<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYearMonthStatist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statists', function (Blueprint $table) {
            //
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statists', function (Blueprint $table) {
            //
            $table->dropColumn('year');
            $table->dropColumn('month');

        });
    }
}
