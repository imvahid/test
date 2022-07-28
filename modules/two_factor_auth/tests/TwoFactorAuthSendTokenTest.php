<?php

namespace Modules\TwoFactorAuth\Tests;

use App\Models\User;
use Modules\TwoFactorAuth\Facades\TokenGeneratorFacade;
use Modules\TwoFactorAuth\Facades\TokenStoreFacade;
use Modules\TwoFactorAuth\Facades\UserProviderFacade;
use Tests\TestCase;

class TwoFactorAuthSendTokenTest extends TestCase
{
    public function test_sample()
    {
        User::unguard();
        $this->withoutExceptionHandling();

        UserProviderFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with('imvahid@gmail.com')
            ->andReturn($user = new User(['id' => 1, 'email' => 'imvahid@gmail.com']));

        TokenGeneratorFacade::shouldReceive('generateToken')
            ->once()
            ->withNoArgs()
            ->andReturn('123456');

        TokenStoreFacade::shouldReceive('saveToken')
            ->once()
            ->with('123456', $user->id);

        $response = $this->get('/api/two-factor-auth/send?email=imvahid@gmail.com');
        $this->assertTrue($response->content() == 'hello');
    }
}
