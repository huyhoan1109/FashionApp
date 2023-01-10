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
            $table->id();
            $table->string('note');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("coupon_id")->nullable();
            $table->integer('payment');
            $table->float('total');
            $table->boolean("isApproved")->default(false);
            $table->foreign('user_id')
            ->references("id")
            ->on("users")
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
