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
        Schema::create('car_specs', function (Blueprint $table) {

            $table->id();

            $table->unsignedInteger('product_id');

            // nhóm
            $table->string('group_name');

            // tên thông số
            $table->string('spec_name');

            // giá trị
            $table->text('spec_value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_specs');
    }
};
