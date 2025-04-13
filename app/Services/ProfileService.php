<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }

    public function updateProfile(array $data)
    {
        $user = Auth::user();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'nationality' => $data['nationality'] ?? null,
        ]);

        return $user;
    }
}
