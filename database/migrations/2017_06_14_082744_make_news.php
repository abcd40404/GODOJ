<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class MakeNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned();
            $table->string('level');
            $table->string('title');
            $table->dateTime('mtime');
            $table->timestamps();
            $table->foreign('uid')->references('id')->on('users');
        });
        DB::table('news')->insert(
            array('uid' => '1', 'level' => '重要', 'title' => 'News測試', 'mtime' => Carbon::now('Asia/Taipei'))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
