<?php

namespace Modules\TwoFactorAuth\Services;

class TokenStoreService
{
    public function saveToken($token, $userId)
    {
        cache()->set($token.'_two_factor_auth', $userId, 120);
    }
}
