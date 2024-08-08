<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PragmaRX\Random\Random;
use App\Models\UsersModel;
use App\Controllers\Utility\CloudflareCaptchaResolver;

class Auth extends BaseController
{
    protected $reffcode;
    protected $userModel;
    protected $random;

    public function __construct()
    {
        helper('cookie');

        $this->userModel = new UsersModel();
        $this->random = new Random();
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $this->validation->setRules([
            'email' => 'required|valid_email',
            'referral_code' => 'permit_empty'
        ]);

        $captchaResponse = $this->request->getVar('cf-turnstile-response');
        $captchaResult = json_decode((new CloudflareCaptchaResolver())->captcha_solver($captchaResponse)->getBody()->getContents(), true);

        if (!$captchaResult['success']) {
            return redirect()->back();
        }

        if (!$this->validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        $user = $this->userModel->where('email', $email)->first();
        if ($user) {
            session()->set('email', $email);
            return redirect()->to('/')->with('success', 'Validation success, now you\'re login!');
        }

        $ref_code = $this->request->getCookie('refflink');
        $upline = $this->userModel->where('referral_code', $ref_code)->first();

        $ip = service('request')->getIPAddress();

        if ($this->userModel->where('ip_address', $ip)->first()) {
            return redirect()->back()->withInput()->with('error', 'You can\'t create multiple accounts! 😈.');
        }

        $newUserData = [
            'email' => $email,
            'balance' => '0.00000000',
            'ip_address' => $ip,
            'referral_code' => $this->random->mixedcase()->size(8)->get(),
            'reff_by' => $upline !== null ? $upline['id'] : null,
            'energy' => $this->setting['free_energy'],
        ];
        $this->userModel->save($newUserData);
        session()->set('email', $email);

        return redirect()->to('/')->with('success', 'Validation success, now you\'re login!');
    }

    public function refflink($reffcode)
    {
        helper('cookie');
        setcookie('refflink', $reffcode, time() + 8400, "/");
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->remove('email');
        return redirect()->to('/');
    }
}
