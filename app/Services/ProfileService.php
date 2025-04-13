<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }


}
