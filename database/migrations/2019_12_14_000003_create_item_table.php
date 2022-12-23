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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('type')->default(0);
            $table->unsignedInteger('color');
            $table->boolean('for_male')->default(true);
            $table->unsignedInteger('size')->default(0);
            $table->float('price')->default(0);
            $table->string('image');
            $table->string('description');
            $table->integer('review');
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
        Schema::dropIfExists('item');
    }
};
