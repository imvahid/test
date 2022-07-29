<?php

namespace Modules\TwoFactorAuth\Services\Responses;

use Illuminate\Http\Response;

class AndroidResponsesService
{
    public function blockedUser()
    {
        return response(['msg' => 'You are blocked'], Response::HTTP_BAD_REQUEST);
    }

    public function tokenSent()
    {
        return response(['msg' => 'Token was sent'], Response::HTTP_OK);
    }

    public function userNotFound()
    {
        return response(['msg' => 'Email does not exist'], Response::HTTP_BAD_REQUEST);
    }
}
