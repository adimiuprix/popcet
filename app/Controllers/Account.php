<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Carbon\Carbon;
use App\Controllers\Utility\FaucetPay;
use App\Models\FaucetModel;
use App\Controllers\Utility\FaucetController;
use App\Models\TransactionModel;
use App\Models\SettingModel;
use App\Models\AdsteraModel;

class Account extends BaseController
{
    protected $session;
    protected $faucetpay;
    protected $faucet_model;
    protected $faucet_controller;
    protected $transaction_model;
    protected $setting_model;
    protected $utility;
    protected $social_bar;

    public function __construct()
    {
        $this->session = session();
        $this->faucet_controller = new FaucetController();
        $this->faucetpay = new FaucetPay();
        $this->faucet_model = new FaucetModel();
        $this->transaction_model = new TransactionModel();
        $this->setting_model = (new SettingModel())->first();
        $this->popunder = (new AdsteraModel())->where('type', 'popunder')->get()->getFirstRow();
        $this->social_bar = (new AdsteraModel())->where('type', 'social_bar')->get()->getFirstRow();
    }

    public function reffer()
    {
        $user = $this->userModel->where('email', $this->session->get('email'))->first();

        $refcode = base_url('reff/' . $user['referral_code']);

        $m_reffs = $this->userModel->where('reff_by', $user['id'])->get()->getResultArray();

        return $this->loadView('user/reffer', compact('refcode', 'm_reffs'));
    }

    public function withdraw()
    {
        $email = $this->session->get('email');

        $user = $this->userModel->where('email', $email)->first();
        $currency = 'USD';
        $balance = $user['balance'];

        $withdraws = (new TransactionModel())
            ->join('users', 'users.id = transactions.user_id', 'left')
            ->where('type', 'Withdraw')
            ->where('email', $email)
            ->limit(10)
            ->get()
            ->getResult();

        return $this->loadView('user/withdraw', compact('currency', 'balance', 'withdraws'));
    }

    public function withdraw_req(){
        $user = $this->userModel->where('email', $this->session->get('email'))->first();
        $min_wd = 0.10000000;
        if($user['balance'] >= $min_wd){
            $this->faucetpay->send_payment($user['balance'], $user['email'], 'TRX', $user['ip_address']);
            $newBalance = $user['balance'] - $user['balance'];
            $this->userModel->update($user['id'], [
                'balance' => $newBalance,
            ]);

            $dataTransaction = [
                'user_id' => $user['id'],
                'amount' => $user['balance'],
                'unixtime' => Carbon::now()->unix(),
                'type' => 'Withdraw'
            ];
            $this->transaction_model->insert($dataTransaction);

        }
        return redirect()->back();
    }

    public function ptc()
    {
        $data = "PTC Data";

        return $this->loadView('user/ptc', compact('data'));
    }

    public function faucet()
    {
        $this->faucet_model->refresh_energy();

        $carbon = new Carbon();
        $timeNow = Carbon::now()->unix();

        $email = $this->session->get('email');
        $user = $this->userModel->where('email', $email)->first();

        $LastClaimTime = $user['last_claim'];
        $CanClaimTime = $LastClaimTime + env('COOLDOWN_CLAIM');

        $get_reward = $this->setting['reward_rate'];

        $energy = $user['energy'];

        return $this->loadView('user/faucet', compact( 'energy', 'get_reward', 'CanClaimTime'));
    }

    public function shortlinks()
    {
        $data = 'aaaaaaaaaaaaaaaaaa';
        return $this->loadView('user/shortlinks', compact('data'));
    }

    private function loadView($view, $compact = [])
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];
        $session = $this->session->get('email');
        $popunder = $this->popunder->meta_data;
        $social_bar = $this->social_bar->meta_data;

        $data = array_merge(
            compact(
                'session', 
                'sitename', 
                'keywords', 
                'description',
                'popunder',
                'social_bar'
            ),
            $compact
        );

        return view($view, $data);
    }
}
