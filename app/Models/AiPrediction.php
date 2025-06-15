<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiPrediction extends Model
{
    //
    protected $fillable = [
        'temperature_value',
        'spo2_value',
        'bpm_value',
        'blood_pressure_value',   // <-- تمت إضافته
        'respiratory_rate_value', // <-- تمت إضافته
        'prediction_result',
    ];
}
