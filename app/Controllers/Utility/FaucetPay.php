<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;

class FaucetPay extends BaseController
{
    protected $apiKey;
    protected $client;

    public function __construct(){
        $this->client = \Config\Services::curlrequest();
        $this->apiKey = env('FAUCETPAY_API_KEY'); // Ganti dengan API key kamu
    }

    public function send_payment(float $amount, string $to, $currency, $ipAddress){
        $params = [
            'api_key' => $this->apiKey,
            'amount' => (int)($amount * 100000000),
            'to' => $to,
            'currency' => $currency,
            'ip_address' => $ipAddress,
        ];

        $this->makeRequest('https://faucetpay.io/api/v1/send', $params);
    }

    private function makeRequest($url, $params)
    {
        $response = $this->client->request('POST', $url, [
            'form_params' => $params
        ]);

        return json_decode($response->getBody(), true);
    }
}
