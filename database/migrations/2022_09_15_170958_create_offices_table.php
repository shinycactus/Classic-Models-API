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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('city', 50);
            $table->string('phone', 50);
            $table->string('address_line_1', 50);
            $table->string('address_line_2', 50)->nullable()->default(null);
            $table->string('state', 50)->nullable()->default(null);
            $table->string('country', 50);
            $table->string('postal_code', 50);
            $table->string('territory', 50);
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
        Schema::dropIfExists('offices');
    }
};
