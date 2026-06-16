<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.register');
    }

    /**
     * Handle registration submission.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'      => ['required', 'confirmed', Password::min(8)],
            'business_type' => ['required', 'string', 'max:100'],
        ], [
            'name.required'          => 'الاسم الكامل مطلوب.',
            'name.max'               => 'الاسم لا يتجاوز 100 حرف.',
            'email.required'         => 'البريد الإلكتروني مطلوب.',
            'email.email'            => 'البريد الإلكتروني غير صالح.',
            'email.unique'           => 'هذا البريد الإلكتروني مسجل مسبقاً.',
            'password.required'      => 'كلمة المرور مطلوبة.',
            'password.confirmed'     => 'كلمتا المرور غير متطابقتين.',
            'password.min'           => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل.',
            'business_type.required' => 'يرجى اختيار نوع النشاط.',
        ]);

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'business_type' => $request->business_type,
        ]);

        Auth::login($user);

        return redirect(route('dashboard'))->with('success', 'تم إنشاء حسابك بنجاح، مرحباً بك في URCA!');
    }


    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('auth.login');
    }

    /**
     * Handle login submission.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'البريد الإلكتروني مطلوب.',
            'email.email'       => 'البريد الإلكتروني غير صالح.',
            'password.required' => 'كلمة المرور مطلوبة.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'مرحباً بك مجدداً!');
        }

        return back()->withErrors([
            'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
        ])->withInput($request->only('email'));
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
