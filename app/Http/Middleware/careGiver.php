<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class careGiver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // استخدم الـ guard الصحيح
        if (!Auth::guard('care_giver')->check()) {
            // return redirect()->route('careGiver.login')->with('error', 'You must be logged in as a care giver to access this page.');
            return (redirect()->route('careGiver.login')->with('error', 'يجب عليك تسجيل الدخول كمقدم رعاية للوصول إلى هذه الصفحة.')
            );
        }

        // إذا أردت التحقق من الدور (role) أيضًا:
        // $user = Auth::guard('care_giver')->user();
        // if ($user->role !== 'care_giver') {
        //     return redirect()->route('careGiver.login')->with('error', 'You must be logged in as a care giver to access this page.');
        // }

        return $next($request);
    }
}
