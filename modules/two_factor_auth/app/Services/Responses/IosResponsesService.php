<?php

namespace Modules\TwoFactorAuth\Services\Responses;

use Illuminate\Http\Response;

class IosResponsesService
{
    public function blockedUser()
    {
        return response(['result' => 'You are blocked'], Response::HTTP_BAD_REQUEST);
    }

    public function tokenSent()
    {
        return response(['result' => 'Token was sent'], Response::HTTP_OK);
    }
}
