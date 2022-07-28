<?php

namespace Modules\TwoFactorAuth\Services;

use App\Models\User;

class UserProviderService
{
    public function getUserByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }
}
