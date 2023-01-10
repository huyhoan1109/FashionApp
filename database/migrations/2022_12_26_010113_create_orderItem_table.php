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
        Schema::create('orderItem', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->float('discount_price');
            $table->integer('quantity');
            $table->string('name');
            $table->string('description')->nullable();                          
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')
            ->references("id")
            ->on("order")
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
        Schema::dropIfExists('orderItem');
    }
};