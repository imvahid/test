<?php

namespace Modules\TwoFactorAuth\Services\Responses;

use Illuminate\Http\Response;

class VueResponsesService
{
    public function blockedUser()
    {
        return response(['message' => 'You are blocked'], Response::HTTP_BAD_REQUEST);
    }

    public function tokenSent()
    {
        return response(['message' => 'Token was sent'], Response::HTTP_OK);
    }

    public function userNotFound()
    {
        return response(['message' => 'Email does not exist'], Response::HTTP_BAD_REQUEST);
    }
}
