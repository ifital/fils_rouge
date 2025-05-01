<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $this->authService->register($request->validated());

        return redirect()->route('login')->with('success', 'Compte créé avec succès.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        if ($this->authService->login($request->validated())) {
            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->route('admin.statistics'),
                'employee' => redirect()->route('employee.users.index'),
                default => redirect()->route('client.home'),
            };
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }
}
