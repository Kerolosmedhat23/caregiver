<?php

namespace App\Http\Controllers;

use App\Models\careGiver;
use App\Models\User; // أضف هذا السطر في الأعلى
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareGiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caregiver = Auth::guard('care_giver')->user();
        // العلاقة من caregiver إلى user (أو patient)
        $patient = $caregiver->user ?? null; // أو $caregiver->patient حسب اسم العلاقة عندك

        return view('caregiver.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('caregiver.register', compact('users')); // أرسلهم للصفحة
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'emergency_contact_phone' => ['required', 'string', 'max:15'],
            'user_id' => ['required', 'exists:users,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        $data = $request->except('password_confirmation', 'password', 'avatar');
        $data['password'] = bcrypt($request->password);
        if ($request->hasFile('avatar')) {
            $avatarName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('assets/avatars'), $avatarName);
            $data['avatar'] = 'assets/avatars/' . $avatarName;
        } else {
            $data['avatar'] = null;
        }
        $careGiver = careGiver::create($data);
        $careGiver->user()->associate($request->user_id);
        $careGiver->save();
        // تسجيل الدخول تلقائيًا بعد التسجيل
        Auth::login($careGiver->user);
        Auth::guard('care_giver')->login($careGiver);

        return redirect()->route('careGiver.index')->with('success', 'Caregiver registered successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(careGiver $careGiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $careGiver = Auth::guard('care_giver')->user();
        return view('caregiver.update', compact('careGiver'));
        // عرض صفحة تحرير معلومات مقدم الرعاية
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $careGiver = Auth::guard('care_giver')->user();

        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $avatarName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('assets/avatars'), $avatarName);
            $data['avatar'] = 'assets/avatars/' . $avatarName;
        } else {
            $data['avatar'] = $careGiver->avatar;
        }

        $careGiver->update($data);

        return redirect()->route('careGiver.index')->with('success', 'Caregiver updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(careGiver $careGiver)
    {
        //
    }
    public function login()
    {
        return view('caregiver.login'); // عرض صفحة تسجيل الدخول لمقدمي الرعاية
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('care_giver')->attempt($credentials)) {
            // تسجيل الدخول ناجح
            return redirect()->route('careGiver.index')->with('success', 'تم تسجيل الدخول بنجاح.');
        }

        // تسجيل الدخول فشل
        return redirect()->back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }
}
