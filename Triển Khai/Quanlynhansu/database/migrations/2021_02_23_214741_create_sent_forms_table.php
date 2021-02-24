<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->references('id')->on('users')->onUpdate('cascade');
            $table->integer('employee_id')->nullable()->references('id')->on('employees')->onUpdate('cascade');
            $table->string('ca');
            $table->date('daywork');
            $table->date('daysent');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('sent_forms');
    }
}
