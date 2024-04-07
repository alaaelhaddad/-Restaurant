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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('orderNo');
            $table->Date('orderdate');
            $table->Time('orderTime');
            $table->String('custumerName');
            $table->String('custumerPhone');
            $table->String('custumerAddress');
            $table->String('paymentType');
            $table->mony('paid');
            $table->String('orderState');
            $table->String('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
