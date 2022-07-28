<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => '\Modules\TwoFactorAuth\Http\Controllers',
    'prefix'    => 'api'
], function () {
    Route::get('/two-factor-auth/send', 'TokenSenderController@send')->name('send.token');
});
