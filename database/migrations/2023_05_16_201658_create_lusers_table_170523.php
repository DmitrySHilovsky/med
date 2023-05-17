<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLusersTable170523 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lusers', function (Blueprint $table) {
            $table->id();
            $table->string('Lastname');
            $table->string('Name');
            $table->string('Surename');
            $table->string('Email');
            $table->string('Phone');
            $table->string('City');
            $table->string('Job');
            $table->string('Hash')->unique();
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
        Schema::dropIfExists('lusers');
    }
}
