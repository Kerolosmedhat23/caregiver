<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    protected $fillable = [
        'sensor_name',
        'value',
        'recorded_at',
    ];
}
