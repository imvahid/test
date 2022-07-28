<?php

namespace Modules\TwoFactorAuth\Http\Controllers;

use App\Http\Controllers\Controller;

class TokenSenderController extends Controller
{
    public function send()
    {
        $email = request('email');
        // 1. Stop block users
        // 2. Generate token
        // 3. Save token
        // 4. Send token
        // 5. Send response
        return 'hello';
    }
}
