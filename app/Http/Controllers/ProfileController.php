<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show()
    {
        $user = $this->profileService->getAuthenticatedUser();
        return view('client.profile', compact('user'));
    }

    public function update($request)
    {
        $user = $this->profileService->updateProfile($request->validated());

        return back()->with('success', 'Profil mis à jour avec succès.');
    }
}
