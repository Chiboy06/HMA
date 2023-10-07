<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showLogin() {
        return view('loginForm');
    }

    public function showAppointment() {
        return view('appointmentForm');
    }

    public function showRegister() {
        return view('register');
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);

        $credientials = [
            'email' => $incomingFields['loginEmail'], 
            'password' => $incomingFields['loginPassword']
        ];

        if (auth()->attempt($credientials)) {
            $request->session()->regenerate();
            return redirect('/')->with('login', 'Login Successful!');
        }

        return redirect('/loginForm')->withErrors(['loginEmail'=> 'Invalid credientials'])->onlyInput('email');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:40', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('register', 'Welcome');
    }
}
