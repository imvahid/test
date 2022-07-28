<?php

namespace Modules\TwoFactorAuth\Services;

class TokenGeneratorService
{
    public function generateToken()
    {
        return rand(100000, 1000000 - 1);
    }
}
