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
        //
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->float('price');
            $table->float('discount');
            $table->string('bar_code');
            $table->unsignedBigInteger('category_id');
            $table->float('rating');
            $table->integer('rating_count');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();


         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('categories');
    }
};
