<?php

namespace Modules\TwoFactorAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\TwoFactorAuth\Facades\TokenGeneratorFacade;
use Modules\TwoFactorAuth\Facades\TokenSenderFacade;
use Modules\TwoFactorAuth\Facades\TokenStoreFacade;
use Modules\TwoFactorAuth\Facades\UserProviderFacade;
use Modules\TwoFactorAuth\Services\TokenGeneratorService;
use Modules\TwoFactorAuth\Services\TokenSenderService;
use Modules\TwoFactorAuth\Services\TokenStoreService;
use Modules\TwoFactorAuth\Services\UserProviderService;

class TwoFactorAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        UserProviderFacade::shouldProxyTo(UserProviderService::class);
        TokenGeneratorFacade::shouldProxyTo(TokenGeneratorService::class);
        TokenStoreFacade::shouldProxyTo(TokenStoreService::class);
        TokenSenderFacade::shouldProxyTo(TokenSenderService::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }
}
