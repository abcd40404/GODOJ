<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });
        DB::table('category')->insert(
            array('type' => 'dp')
        );
        DB::table('category')->insert(
            array('type' => 'greedy')
        );
        DB::table('category')->insert(
            array('type' => 'graph')
        );
        DB::table('category')->insert(
            array('type' => 'math')
        );
        DB::table('category')->insert(
            array('type' => 'string')
        );
        DB::table('category')->insert(
            array('type' => 'other')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
