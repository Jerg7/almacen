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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id('id_requirement');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id_status')->on('status');
            $table->string('requested_amount');
            $table->unsignedBigInteger('id_response');
            $table->foreign('id_response')->references('id_response')->on('requirements_response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
