<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCreditsTable extends Migration
{
    public function up()
    {
        Schema::create('user_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('credit_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_credits');
    }
}
