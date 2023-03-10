<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *p
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('barcode', 18)->nullable()->default(0)->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('merk_id')->unsigned()->nullable();
            $table->integer('price');
            $table->integer('purchase_price');
            $table->integer('weight')->unsigned()->default(0);
            $table->foreignId('size_id')->unsigned()->nullable();
            $table->foreignId('gudang_id')->unsigned()->nullable();
            $table->integer('stock')->unsigned()->default(0);
            $table->integer('gd_stock')->unsigned()->default(0);
            $table->integer('sold')->unsigned()->default(0);
            $table->text('image_main');
            $table->text('url');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
