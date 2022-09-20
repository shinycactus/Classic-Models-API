<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('product_name', 70);
            $table->unsignedBigInteger('product_line_id');
            $table->string('product_scale', 10);
            $table->string('product_vendor', 50);
            $table->text('product_description');
            $table->smallInteger('quantity_in_stock');
            $table->decimal('buy_price', 10, 2);
            $table->decimal('msrp', 10, 2);
            $table->timestamps();

            $table->foreign('product_line_id')->references('id')->on('product_lines');
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
};
