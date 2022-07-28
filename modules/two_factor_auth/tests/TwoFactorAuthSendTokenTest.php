<?php

namespace Modules\TwoFactorAuth\Tests;

use App\Models\User;
use Modules\TwoFactorAuth\Facades\ResponderFacade;
use Modules\TwoFactorAuth\Facades\TokenGeneratorFacade;
use Modules\TwoFactorAuth\Facades\TokenStoreFacade;
use Modules\TwoFactorAuth\Facades\UserProviderFacade;
use Tests\TestCase;

class TwoFactorAuthSendTokenTest extends TestCase
{
    public function test_sample()
    {
        User::unguard();

        UserProviderFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with('imvahid@gmail.com')
            ->andReturn($user = new User(['id' => 1, 'email' => 'imvahid@gmail.com']));

        UserProviderFacade::shouldReceive('isBanned')
            ->once()
            ->with($user->id)
            ->andReturn(false);

        TokenGeneratorFacade::shouldReceive('generateToken')
            ->once()
            ->withNoArgs()
            ->andReturn('123456');

        TokenStoreFacade::shouldReceive('saveToken')
            ->once()
            ->with('123456', $user->id);

        ResponderFacade::shouldReceive('tokenSent')
            ->once();

        $this->get('/api/two-factor-auth/send?email=imvahid@gmail.com');
    }

    public function test_user_is_banned()
    {
        User::unguard();

        UserProviderFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with('imvahid@gmail.com')
            ->andReturn($user = new User(['id' => 1, 'email' => 'imvahid@gmail.com']));

        UserProviderFacade::shouldReceive('isBanned')
            ->once()
            ->with($user->id)
            ->andReturn(true);

        TokenGeneratorFacade::shouldReceive('generateToken')
            ->never();

        TokenStoreFacade::shouldReceive('saveToken')
            ->never();

        $response = $this->get('/api/two-factor-auth/send?email=imvahid@gmail.com');
        $response->assertStatus(400);
        $response->assertJson(['message' => 'You are blocked']);
    }

    public function test_android_responses()
    {
        User::unguard();

        UserProviderFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with('imvahid@gmail.com')
            ->andReturn($user = new User(['id' => 1, 'email' => 'imvahid@gmail.com']));

        UserProviderFacade::shouldReceive('isBanned')
            ->once()
            ->with($user->id)
            ->andReturn(false);

        TokenGeneratorFacade::shouldReceive('generateToken')
            ->once()
            ->withNoArgs()
            ->andReturn('123456');

        TokenStoreFacade::shouldReceive('saveToken')
            ->once()
            ->with('123456', $user->id);

        $response = $this->get('/api/two-factor-auth/send?email=imvahid@gmail.com&client=android');
        $response->assertJson(['msg' => 'Token was sent']);
    }
}
