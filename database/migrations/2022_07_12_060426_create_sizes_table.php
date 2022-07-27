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
            $table->integer('xs')->nullable()->default(0);
            $table->integer('s')->nullable()->default(0);
            $table->integer('m')->nullable()->default(0);
            $table->integer('lg')->nullable()->default(0);
            $table->integer('xl')->nullable()->default(0);
            $table->integer('xxl')->nullable()->default(0);
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
