<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Problem extends Migration
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
            $table->string('type');
            $table->string('title');
            $table->integer('time');
            $table->integer('memory');
            $table->text('content');
            $table->string('inp_spec');
            $table->string('out_spec');
            $table->dateTime('mtime');
            $table->timestamps();
            $table->foreign('type')->references('type')->on('category');
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
