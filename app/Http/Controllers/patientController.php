<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class patientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $caregiver = $user->caregiver; // سيجلب الـ Caregiver إذا كان مربوط، أو null إذا لا يوجد

        return view('patient.index', compact('caregiver'));
    }
    public function heartRate()
    {
        return view('patient.heartRate');
    }
    public function temperature()
    {
        return view('patient.temperature');
    }
    public function bloodPressure()
    {
        return view('patient.bloodPresaure');
    }
    public function edit()
    {
        return view('patient.updatePatient');
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:15', 'unique:users,phone,' . $user->id],
            'address' => ['required', 'string', 'max:255'],
            'chronic_diseases' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->chronic_diseases = $request->chronic_diseases;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    function history()
    {
        // Assuming you have a model for patient history
        // $history = PatientHistory::where('user_id', Auth::id())->get();
        // return view('patient.history', compact('history'));

        // For now, just returning a view
        return view('patient.history');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
