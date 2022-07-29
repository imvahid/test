<?php

namespace Modules\TwoFactorAuth\Facades;

use Modules\TwoFactorAuth\Services\Responses\AndroidResponsesService;
use Modules\TwoFactorAuth\Services\Responses\IosResponsesService;
use Modules\TwoFactorAuth\Services\Responses\ReactResponsesService;
use Modules\TwoFactorAuth\Services\Responses\VueResponsesService;

/**
 * @class \Modules\TwoFactorAuth\Facades\ResponderFacade
 *
 * @method static blockedUser()
 * @method static tokenSent()
 * @method static userNotFound()
 *
 */

class ResponderFacade extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return match (request('client')) {
            'ios'     => IosResponsesService::class,
            'react'   => ReactResponsesService::class,
            'android' => AndroidResponsesService::class,
            default   => VueResponsesService::class
        };
    }
}
