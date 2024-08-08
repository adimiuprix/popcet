<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;
use GuzzleHttp\Client;

class CloudflareCaptchaResolver extends BaseController
{
    public function captcha_solver(string $token){
        // Jalankan Captcha Resolver
        $client = new Client();
        $httpResponse = $client->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'form_params' => [
                'secret' => env('CF_PRIVATE_KEY'),
                'response' => $token
            ]
        ]);

        return $httpResponse;
    }
}
