<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionValueProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_value_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_value_id');
            $table->integer('quantity')->nullable();
            $table->decimal('price')->nullable();
            $table->foreign('option_value_id')->references('id')->on('option_values');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_value_product');
    }
}
