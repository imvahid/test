<?php

namespace Modules\TwoFactorAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\TwoFactorAuth\Facades\ResponderFacade;
use Modules\TwoFactorAuth\Facades\TokenGeneratorFacade;
use Modules\TwoFactorAuth\Facades\TokenStoreFacade;
use Modules\TwoFactorAuth\Facades\UserProviderFacade;

class TokenSenderController extends Controller
{
    public function send()
    {
        $email = request('email');
        // Validate email
        // Check user is guest
        // Throttle the route

        // 1. Stop block users
        // Find user row in database or fail
        $user = UserProviderFacade::getUserByEmail($email);

        if(UserProviderFacade::isBanned($user->id)) {
            return ResponderFacade::blockedUser();
        }

        // 2. Generate token
        $token = TokenGeneratorFacade::generateToken();

        // 3. Save token
        TokenStoreFacade::saveToken($token, $user->id);
        // 4. Send token

        // 5. Send response
        return ResponderFacade::tokenSent();
    }
}
