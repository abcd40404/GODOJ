<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSubmission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned();
            $table->integer('uid')->unsigned();
            $table->string('lang');
            $table->double('time');
            $table->integer('memory');
            $table->string('result');
            $table->dateTime('mtime');
            $table->timestamps();
            $table->foreign('pid')->references('id')->on('problems');
            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
