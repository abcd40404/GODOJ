<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProblem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contest');
            $table->integer('cid')->unsigned();
            $table->string('title');
            $table->integer('time');
            $table->integer('memory');
            $table->text('content');
            $table->string('inp_spec');
            $table->string('out_spec');
            $table->dateTime('mtime');
            $table->timestamps();
            $table->foreign('cid')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem');
    }
}
