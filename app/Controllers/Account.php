<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Carbon\Carbon;
use App\Controllers\Utility\FaucetPay;

class Account extends BaseController
{
    protected $session;
    protected $faucetpay;

    public function __construct()
    {
        $this->session = session();
        $this->faucetpay = new FaucetPay();
    }

    public function reffer()
    {
        $user = $this->userModel->where('email', $this->session->get('email'))->first();
        $refcode = base_url('reff/' . $user['referral_code']);
        return $this->loadView('user/reffer', compact('refcode'));
    }

    public function withdraw()
    {
        $email = $this->session->get('email');
        $user = $this->userModel->where('email', $email)->first();
        $currency = 'USD';
        $balance = $user['balance'];

        return $this->loadView('user/withdraw', compact('currency', 'balance'));
    }

    public function withdraw_req(){
        $user = $this->userModel->where('email', $this->session->get('email'))->first();
        $this->faucetpay->send_payment($user['balance'], $user['email'], 'TRX', $user['ip_address']);
        return redirect()->back();
    }

    public function ptc()
    {
        $data = "PTC Data";

        return $this->loadView('user/ptc', compact('data'));
    }

    public function faucet()
    {
        $carbon = new Carbon();
        $timeNow = Carbon::now()->unix();

        $email = $this->session->get('email');
        $user = $this->userModel->where('email', $email)->first();

        $LastClaimTime = $user['last_claim'];
        $CanClaimTime = $LastClaimTime + 60;

        $get_reward = $this->setting['reward_rate'];

        $energy = $user['energy'];
        // dd($energy);
        return $this->loadView('user/faucet', compact( 'energy', 'get_reward', 'CanClaimTime'));
    }

    public function shortlinks()
    {
        $data = 'aaaaaaaaaaaaaaaaaa';
        return $this->loadView('user/shortlinks', compact('data'));
    }

    private function loadView($view, $compact = [])
    {
        $session = $this->session->get('email');
        $data = array_merge(compact('session'), $compact);

        return view($view, $data);
    }
}
