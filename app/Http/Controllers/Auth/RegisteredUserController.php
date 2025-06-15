<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:20'],
            'dateOfbirth' => ['required', 'date', 'before:today'],
            'chronic_diseases' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],

        ]);

        $data = $request->except(['avatar', 'password', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);

        // Handle avatar upload to public/assets/avatars
        if ($request->hasFile('avatar')) {
            $avatarName = uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('assets/avatars'), $avatarName);
            $data['avatar'] = 'assets/avatars/' . $avatarName;
        } else {
            $data['avatar'] = null;
        }

        $user = User::create($data);

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('patient.index', absolute: false));
    }
}
