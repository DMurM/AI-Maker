<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user=Auth::user();
            return redirect()->intended('/user_dashboard')->with([
                'name' => $user->name,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'credits' => $user->credits ?? 0
            ]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showSignupForm()
    {
        return view('auth.signup');
    }

    // Handle signup request
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::createUser($validatedData);

        Auth::login($user);

        return redirect()->intended('/user_dashboard')->with([
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'credits' => $user->credits ?? 0
        ]);
    }

    public function showDashboard()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();   
        return view('user_dashboard')->with([   
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'credits' => $user->credits ?? 0 // Asegúrate de que tienes esta columna en tu tabla users
        ]);
    }

    public function showPasswordResetForm()
    {
        return view('auth.passwords.email');
    }

    // Handle password reset link request
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    // Handle logout request
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
