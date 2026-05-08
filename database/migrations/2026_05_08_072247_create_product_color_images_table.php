<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColorImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_color_images', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('product_color_id');

            $table->string('image');

            $table->integer('sort_order')->default(0);

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('product_color_images');
    }
}