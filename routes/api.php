<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;



// Route to receive sensor data from Raspberry Pi
Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/latest-vital-signs', [SensorDataController::class, 'getLatestVitalSigns']);
Route::post('/sensor-data-with-prediction', [SensorDataController::class, 'storeWithPrediction']);
Route::get('/ai-prediction/latest', [SensorDataController::class, 'getLatestAiPrediction']);
