<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->bigIncrements('address_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on(('customers'));
            $table->string('address_line_1');
            $table->string('city');
            $table->string('state');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');

    }
};
