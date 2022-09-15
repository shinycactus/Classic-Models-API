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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->string('contact_last_name', 50);
            $table->string('contact_first_name', 50);
            $table->string('phone', 50);
            $table->string('address_line_1', 50);
            $table->string('address_line_2', 50)->nullable()->default(null);
            $table->string('city', 50);
            $table->string('state', 50)->nullable()->default(null);
            $table->string('postal_code', 15)->nullable()->default(null);
            $table->string('country', 15);
            $table->string('sales_rep_employee_id', 15)->nullable()->default(null);
            $table->timestamps();

            // $table->foreign('sales_rep_employee_id')->references('id')->on('employees');

        });


        // `customerNumber` int(11) NOT NULL,
        // `customerName` varchar(50) NOT NULL,
        // `contactLastName` varchar(50) NOT NULL,
        // `contactFirstName` varchar(50) NOT NULL,
        // `phone` varchar(50) NOT NULL,
        // `addressLine1` varchar(50) NOT NULL,
        // `addressLine2` varchar(50) DEFAULT NULL,
        // `city` varchar(50) NOT NULL,
        // `state` varchar(50) DEFAULT NULL,
        // `postalCode` varchar(15) DEFAULT NULL,
        // `country` varchar(50) NOT NULL,
        // `salesRepEmployeeNumber` int(11) DEFAULT NULL,
        // `creditLimit` decimal(10,2) DEFAULT NULL,
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
