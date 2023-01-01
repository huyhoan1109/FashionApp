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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->default("N/A");
            $table->string('lastname')->default("N/A");
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->default("Ha Noi");
            $table->integer('phone')->default(0);
            $table->integer('type')->default(1); # 0 => admin ; 1 => user thông thường ; 2 => user vãng lai
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
