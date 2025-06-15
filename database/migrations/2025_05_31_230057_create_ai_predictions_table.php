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
        Schema::create('ai_predictions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('temperature_value')->nullable();
            $table->float('spo2_value')->nullable();
            $table->float('bpm_value')->nullable();
            $table->float('blood_pressure_value')->nullable();    // لتخزين قيمة ضغط الدم (المحاكاة)
            $table->float('respiratory_rate_value')->nullable();  // لتخزين قيمة معدل التنفس (المحاكاة)
            $table->string('prediction_result');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_predictions');
    }
};
