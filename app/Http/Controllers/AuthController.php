<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|unique:users|max:15',
            'nationality' => 'nullable|string|max:100',
            'role' => 'required|in:admin,employee,client',
        ]);

        $this->authService->register($request->only([
            'name', 'email', 'password', 'role', 'phone', 'nationality'
        ]));

        return redirect()->route('login')->with('success', 'Inscription réussie. Connecte-toi maintenant.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = $this->authService->login($credentials);

        return $this->redirectBasedOnRole($user);
    }

    public function logout()
    {
        $this->authService->logout();

        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }

    private function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard.dashboard')->with('success', 'Bienvenue Admin !');
            case 'employee':
                return redirect()->route('emploiyee.dashboard')->with('success', 'Bienvenue Manager !');
            case 'client':
            default:
                return redirect()->route('home')->with('success', 'Bienvenue Client !');
        }
    }
}
