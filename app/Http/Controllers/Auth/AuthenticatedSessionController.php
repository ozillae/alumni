<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log ;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $loginField => $request->input('login'),
            'password' => $request->input('password'),
        ];

        // Debugging log
        Log::info('Login attempt', [
            'input' => $request->input('login'),
            'loginField' => $loginField,
            'credentials' => $credentials,
        ]);

        if (Auth::attempt($credentials)) {
            Log::info('Login successful', ['user' => Auth::user()]);
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Check if user exists but password is incorrect
        $userExists = \App\Models\User::where($loginField, $request->input('login'))->exists();
        $errorMessage = $userExists
            ? 'Password yang Anda masukkan salah.'
            : 'Akun dengan ' . $loginField . ' tersebut tidak ditemukan.';

        Log::warning('Login failed', ['credentials' => $credentials]);

        return back()->withErrors([
            'login' => $errorMessage,
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
