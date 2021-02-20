<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatist extends Migration
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
            $table->double('money')->nullable();
            $table->double('bonus_money')->nullable();
            $table->double('discip_money')->nullable();
            $table->integer('attend')->nullable();
            $table->double('real_money')->nullable();
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
            $table->dropColumn('money');
            $table->dropColumn('bonus_money');
            $table->dropColumn('discip_money');
            $table->dropColumn('attend');
            $table->dropColumn('real_money');
        });
    }
}
