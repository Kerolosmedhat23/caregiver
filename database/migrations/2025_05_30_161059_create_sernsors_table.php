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
        Schema::create('sernsors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('temptrature');
            $table->json('heart_rate');
            $table->json('blood_pressure');
            $table->json('prediction')->nullable();
            $table->unsignedBigInteger('care_giver_id')->nullable();
            $table->foreign('care_giver_id')->references('id')->on('care_givers')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sernsors');
    }
};
