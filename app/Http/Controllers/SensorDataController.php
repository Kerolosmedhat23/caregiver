<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorReading;
use App\Models\AiPrediction; // استيراد الموديل الجديد
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'sensor_name' => 'required|string|max:255', // جيد إضافة max
            'value' => 'required|numeric',
        ]);

        // Store the reading in the database
        SensorReading::create([
            'sensor_name' => $validated['sensor_name'],
            'value' => $validated['value'],
        ]);

        return response()->json(['message' => 'Data saved successfully'], 201);
    }

    public function getLatestVitalSigns()
    {
        // جلب آخر قراءة لمعدل نبضات القلب (bpm)
        $latestHeartRate = SensorReading::where('sensor_name', 'bpm')
            ->latest('created_at')
            ->first();

        // جلب آخر قراءة لتشبع الأكسجين (spo2)
        $latestSpo2 = SensorReading::where('sensor_name', 'spo2')
            ->latest('created_at')
            ->first();

        // جلب آخر قراءة لدرجة الحرارة (temperature)
        $latestTemperature = SensorReading::where('sensor_name', 'temperature')
            ->latest('created_at')
            ->first();

        // (اختياري) يمكنك أيضًا جلب آخر قراءة لـ blood_pressure_sim و respiratory_rate_sim إذا أردت عرضها
        $latestBloodPressureSim = SensorReading::where('sensor_name', 'blood_pressure_sim') // أو 'blood_pressure' إذا استخدمت هذا الاسم
            ->latest('created_at')
            ->first();
        $latestRespiratoryRateSim = SensorReading::where('sensor_name', 'respiratory_rate_sim') // أو 'respiratory_rate'
            ->latest('created_at')
            ->first();


        return response()->json([
            'heart_rate' => $latestHeartRate ? $latestHeartRate->value : null,
            'spo2' => $latestSpo2 ? $latestSpo2->value : null,
            'temperature' => $latestTemperature ? $latestTemperature->value : null,
            'blood_pressure_sim' => $latestBloodPressureSim ? $latestBloodPressureSim->value : null, // (اختياري)
            'respiratory_rate_sim' => $latestRespiratoryRateSim ? $latestRespiratoryRateSim->value : null, // (اختياري)
        ]);
    }

    public function storeWithPrediction(Request $request)
    {
        Log::info('Received data with prediction request:', $request->all());

        // تعديل الـ Validator ليطابق أسماء المفاتيح القادمة من البايثون
        // ويتضمن الحقول المحاكاة
        $validator = Validator::make($request->all(), [
            'temperature_value'       => 'required|numeric',
            'spo2_value'              => 'required|numeric',
            'bpm_value'               => 'required|numeric',
            'blood_pressure_value'    => 'required|numeric', // قيمة محاكاة
            'respiratory_rate_value'  => 'required|numeric', // قيمة محاكاة
            'prediction_result'       => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for prediction data:', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        try {
            // 1. تخزين قراءات الحساسات (بما في ذلك المحاكاة) في جدول sensor_readings
            // إذا كنت لا تريد تكرار تخزينها هنا (لأنها قد تكون أُرسلت مسبقًا عبر /sensor-data),
            // يمكنك إزالة هذا الجزء أو تعديله.
            // ولكن, إذا كان /sensor-data-with-prediction هو المصدر الوحيد لهذه المجموعة من البيانات, فهذا جيد.

            SensorReading::create([
                'sensor_name' => 'temperature', // اسم الحساس كما هو في جدولك
                'value' => $validatedData['temperature_value']
            ]);
            SensorReading::create([
                'sensor_name' => 'spo2',
                'value' => $validatedData['spo2_value']
            ]);
            SensorReading::create([
                'sensor_name' => 'bpm',
                'value' => $validatedData['bpm_value']
            ]);
            SensorReading::create([
                // يمكنك استخدام اسم مختلف إذا أردت تمييز القيم المحاكاة
                'sensor_name' => 'blood_pressure', // أو 'blood_pressure_sim'
                'value' => $validatedData['blood_pressure_value']
            ]);
            SensorReading::create([
                // يمكنك استخدام اسم مختلف إذا أردت تمييز القيم المحاكاة
                'sensor_name' => 'respiratory_rate', // أو 'respiratory_rate_sim'
                'value' => $validatedData['respiratory_rate_value']
            ]);

            // 2. تخزين الـ AI Prediction
            // تأكد أن الأعمدة في $fillable بموديل AiPrediction تطابق هذه المفاتيح
            AiPrediction::create([
                'temperature_value'      => $validatedData['temperature_value'],
                'spo2_value'             => $validatedData['spo2_value'],
                'bpm_value'              => $validatedData['bpm_value'],
                'blood_pressure_value'   => $validatedData['blood_pressure_value'],
                'respiratory_rate_value' => $validatedData['respiratory_rate_value'],
                'prediction_result'      => $validatedData['prediction_result'],
            ]);

            return response()->json(['message' => 'Data and prediction saved successfully'], 201);
        } catch (\Exception $e) {
            Log::error('Error saving data with prediction: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString() // إضافة الـ trace للتشخيص
            ]);
            return response()->json(['error' => 'Failed to save data', 'details' => $e->getMessage()], 500);
        }
    }
    public function getLatestAiPrediction()
    {
        $latestPrediction = \App\Models\AiPrediction::latest('id')->first();

        if (!$latestPrediction) {
            return response()->json(['message' => 'No prediction found'], 404);
        }

        // استبعاد created_at و updated_at من النتائج
        $result = $latestPrediction->makeHidden(['created_at', 'updated_at']);

        return response()->json($result);
    }
}
