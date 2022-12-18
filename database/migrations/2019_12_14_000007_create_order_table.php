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
        Schema::create('order', function (Blueprint $table) {
            $table->unsignedBigInteger("cart_id");
            $table->unsignedBigInteger("coupon_id");
            $table->foreign('cart_id')
                ->references("id")
                ->on("cart")
                ->onDelete("cascade");
            $table->foreign('coupon_id')
                ->references("id")
                ->on("coupon")
                ->onDelete("cascade");
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
        Schema::dropIfExists('order');
    }
};
