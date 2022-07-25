<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('xs')->unsigned()->default(0);
            $table->integer('s')->unsigned()->default(0);
            $table->integer('m')->unsigned()->default(0);
            $table->integer('lg')->unsigned()->default(0);
            $table->integer('xl')->unsigned()->default(0);
            $table->integer('xxl')->unsigned()->default(0);
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
        Schema::dropIfExists('sizes');
    }
}
