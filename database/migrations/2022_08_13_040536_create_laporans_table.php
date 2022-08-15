<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unsigned();
            $table->foreignId('size_id')->unsigned();
            $table->foreignId('size_name')->unsigned();
            $table->Integer('qty')->unsigned();
            $table->Integer('profit')->unsigned()->nullable()->default(0);
            $table->Integer('loss')->unsigned()->nullable()->default(0);
            $table->Integer('total_purchases')->unsigned()->nullable()->default(0);
            // $table->timestamps();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
