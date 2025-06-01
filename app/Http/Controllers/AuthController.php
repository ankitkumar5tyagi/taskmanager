<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name'=> 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed'
        ]);

        $user = User::create($fields);
        event(new Registered($user));
        return redirect()->route('task.index')->with('success','You have registered successfully.');
    }

    public function noticeEmail() {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/task');
    }

    public function resendEmail (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $user = User::where('email', $fields['email'])->first();

        if($user && Hash::check($fields['password'], $user->password)){
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('task.index')->with('success','You have logged in successfully.');
        }
        else {
            return back()->with('error','Email or Password mismatched');
        }
    }

    public function logout(Request $request){
        Auth::logout($request);
        return redirect()->route('home')->with('success','You have logged out successfully. Please login agin.');
    }
}
