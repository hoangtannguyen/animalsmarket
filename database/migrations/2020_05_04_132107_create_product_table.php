<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->double('price');
            $table->double('promotion_price');
            $table->longText('image')->nullable();
            $table->integer('selling')->default(30);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('acce_id')->nullable();
            $table->unsignedBigInteger('nawing_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->foreign('acce_id')->references('id')->on('product_acce')->onDelete('cascade');
            $table->foreign('nawing_id')->references('id')->on('product_nawing')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('product_type')->onDelete('cascade');

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
