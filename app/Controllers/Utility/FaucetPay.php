<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;

class FaucetPay extends BaseController
{
    protected $apiKey;

    public function __construct(){
        $this->apiKey = env('FAUCETPAY_API_KEY'); // Ganti dengan API key kamu
    }

    public function send_payment(int $amount, string $to, $currency, $ipAddress){
        $params = [
            'api_key' => $this->apiKey,
            'amount' => $amount,
            'to' => $to,
            'currency' => $currency,
            'ip_address' => $ipAddress,
        ];

        $request = $this->makeRequest('https://faucetpay.io/api/v1/send', $params);

        return $this->response->setJSON($request);
    }

    private function makeRequest($url, $params)
    {
        $response = $this->client->request('POST', $url, [
            'form_params' => $params
        ]);

        return json_decode($response->getBody(), true);
    }
}
