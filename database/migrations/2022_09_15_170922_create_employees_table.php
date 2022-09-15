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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('extension', 50);
            $table->string('email', 100);
            $table->unsignedBigInteger('office_id');
            $table->integer('reports_to')->nullable()->default(null);
            $table->string('job_title', 50);
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
