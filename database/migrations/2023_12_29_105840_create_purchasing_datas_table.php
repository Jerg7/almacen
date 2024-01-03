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
        Schema::create('purchasing_datas', function (Blueprint $table) {
            $table->id('id_purchasing_data');
            $table->unsignedBigInteger('id_provider');
            $table->foreign('id_provider')->references('id_provider')->on('providers');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->string('bill');
            $table->string('amount');
            $table->string('prices');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasing_datas');
    }
};
