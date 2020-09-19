<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('from');
            $table->date('to');
            $table->integer('day');
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id')->on('employees');
            $table->unsignedBigInteger('username');
            $table->foreign('username')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
