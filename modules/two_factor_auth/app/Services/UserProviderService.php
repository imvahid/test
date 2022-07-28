<?php

namespace Modules\TwoFactorAuth\Services;

use App\Models\User;

class UserProviderService
{
    public function getUserByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }

    public function isBanned($userId)
    {
        $user = User::query()->find($userId) ?: new User();
        return $user->is_ban == 1 ? true : false;
    }
}
