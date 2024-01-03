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
        Schema::create('products', function (Blueprint $table) {
            // $table->id('id_product');
            // $table->unsignedBigInteger('id_provider');
            // $table->foreign('id_provider')->references('id_provider')->on('providers');
            // $table->string('description');
            // $table->integer('amount');
            // $table->unsignedBigInteger('id_status');
            // $table->foreign('id_status')->references('id_status')->on('user_status');
            // $table->timestamps();
            
            $table->id('id_product');
            $table->unsignedBigInteger('id_provider');
            $table->foreign('id_provider')->references('id_provider')->on('providers');
            $table->unsignedBigInteger('id_product_data');
            $table->foreign('id_product_data')->references('id_product_data')->on('products_datas');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id_status')->on('user_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
