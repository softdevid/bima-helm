<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->Integer('xs')->unsigned()->default(0);
            $table->Integer('s')->unsigned()->default(0);
            $table->Integer('m')->unsigned()->default(0);
            $table->Integer('lg')->unsigned()->default(0);
            $table->Integer('xl')->unsigned()->default(0);
            $table->Integer('xxl')->unsigned()->default(0);            
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
        Schema::dropIfExists('gudangs');
    }
}
