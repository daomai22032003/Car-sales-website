<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColorsTable extends Migration
{
    public function up()
    {
        Schema::create('product_colors', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('product_id');

            $table->string('color_name');

            $table->string('color_code');

            $table->integer('is_default')->default(0);

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('product_colors');
    }
}