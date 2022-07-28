<?php

namespace Modules\TwoFactorAuth\Tests;

use Tests\TestCase;

class TwoFactorAuthSendTokenTest extends TestCase
{
    public function test_sample()
    {
        $response = $this->get('/api/two-factor-auth/send');
        $this->assertTrue($response->content() == 'hello');
    }
}
