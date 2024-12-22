<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        Log::debug('Login attempt with email: ' . $validated['email']);

        try {
            $user = User::where('email', $validated['email'])->first();

            Log::debug('User fetched from database:', $user ? $user->toArray() : []);

            if ($user && Hash::check($validated['password'], $user->password)) {
                Auth::loginUsingId($user->id);
                return redirect()->intended(route('dashboard'));
            }

            Log::warning('Login failed for email: ' . $validated['email']);
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (\Exception $e) {
            Log::error('Error during login: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Log::debug('Registration attempt with data: ', $validated);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Log::debug('User created successfully:', $user->toArray());

            Auth::login($user);

            return redirect()->route('login')->with('success', 'Your account has been successfully created! Please log in.');
        } catch (\Exception $e) {
            Log::error('Error during user registration: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An unexpected error occurred during registration. Please try again.']);
        }
    }
}
