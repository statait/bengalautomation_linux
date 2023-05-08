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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('address');
            $table->string('invoice_no');
            $table->string('payment_type');
            $table->date('sale_date');
            $table->float('sub_total',8,2);  
            $table->float('grand_total',8,2);  
            $table->string('discount_percentage')->nullable();
            $table->string('discount_flat')->nullable();
            $table->string('p_paid_amount');
            $table->string('due_amount');
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
        Schema::dropIfExists('sales');
    }
};
