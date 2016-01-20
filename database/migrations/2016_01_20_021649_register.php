<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Register extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rollno');
            $table->string('phoneno');
            $table->string('team');
            $table->string('dept');
            $table->integer('year');
            $table->string('bloodgrp');
            $table->string('shirtsize');
            $table->string('native');
            $table->string('fatname');
            $table->string('fatprof');
            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('register');
    }
}
