<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class MakeProblem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contest');
            $table->integer('uid')->unsigned();
            $table->integer('cid')->unsigned();
            $table->string('title');
            $table->integer('time');
            $table->integer('memory');
            $table->text('content');
            $table->string('inp_spec');
            $table->string('out_spec');
            $table->dateTime('mtime');
            $table->timestamps();
            $table->foreign('uid')->references('id')->on('users');
            $table->foreign('cid')->references('id')->on('category');
        });
        DB::table('problems')->insert(
            array('contest' => '1', 'uid' => '1', 'cid' => '4', 'title' => 'Fibonacci Number', 'time' => '1', 'memory' => '256', 'content' => 'Output the fibonacci number according to the input n', 'inp_spec' => '1 ≦ n ≦ 90', 'out_spec' => 'output the correspond fibonacci number', 'mtime' => Carbon::now('Asia/Taipei'))
        );
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
