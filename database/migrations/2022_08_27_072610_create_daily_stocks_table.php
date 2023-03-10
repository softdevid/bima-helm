<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_stocks', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('category_id')->nullable(false);
            $table->integer('store')->nullable(false);
            $table->integer('storehouse')->nullable(false);
            $table->string('date')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_stocks');
    }
}
