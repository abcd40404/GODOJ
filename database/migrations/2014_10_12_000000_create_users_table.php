<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('usertype')->default(3);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array('name' => 'admin', 'email' => 'admin@a.a', 'password' => '$2y$10$pdLW8I/dgtzvIDbe5I.Atu.fLxkr2A.2sLc3Ywou3g.5zD/TmwMca', 'usertype' => '1')
        );
        DB::table('users')->insert(
            array('name' => 'test', 'email' => 't@t.t', 'password' => '$2y$10$uxsqIDP7UNihJ2F5W93wR.i5wmDHhNGFtRmpMcj1PGJ1Y2mYYl.iG', 'usertype' => '2')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
