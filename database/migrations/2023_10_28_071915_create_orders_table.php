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
            $table->date("date_order");
            $table->unsignedTinyInteger('company');
            $table->unsignedTinyInteger('place');
            $table->unsignedSmallInteger("shipping_rate");
            $table->unsignedTinyInteger("cart_quantity_items");
            $table->unsignedMediumInteger("amount_cart");
            $table->unsignedMediumInteger("total_to_pay");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
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
