<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] ?? 'client', 
            'phone' => $data['phone'],
            'nationality' => $data['nationality'] ?? null,
        ]);
    }

    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'incorrect informations.',
            ]);
        }

        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();
    }
}
