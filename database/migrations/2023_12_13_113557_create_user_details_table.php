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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id('id_detail');
            $table->string('names');
            $table->string('lastnames');
            $table->string('identification_card');
            $table->string('extension');
            $table->unsignedBigInteger('id_management');
            $table->foreign('id_management')->references('id_management')->on('managements');
            $table->unsignedBigInteger('id_position');
            $table->foreign('id_position')->references('id_position')->on('job_positions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
