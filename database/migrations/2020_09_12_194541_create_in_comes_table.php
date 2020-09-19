<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInComesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_comes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('income');
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('in_comes');
    }
}
