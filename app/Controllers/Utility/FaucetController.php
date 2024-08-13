<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\TransactionModel;
use App\Models\SettingModel;
use Carbon\Carbon;
use App\Controllers\Utility\CloudflareCaptchaResolver;

class FaucetController extends BaseController
{
    protected $transaction;

    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->transaction = new TransactionModel();
    }

    public function running(){
        $email = $this->session->get('email');
        $user = $this->userModel->where('email', $email)->first();

        $settingModel = new SettingModel();
        $getReward = $settingModel->first();

        $timeNow = Carbon::now()->unix();
        $LastClaimTime = $user['last_claim'];
        $canClaim = $LastClaimTime + env('COOLDOWN_CLAIM');

        if(!is_null($user)){

            $result = json_decode((new CloudflareCaptchaResolver())->captcha_solver($this->request->getVar('cf-turnstile-response'))->getBody()->getContents(), true);

            if ($result['success'] == true) {
                if ($user['energy'] >= 1 && $timeNow >= $canClaim) {
                    $balance = $user['balance'];
                    $energy = $user['energy'];
                    $reward = $getReward['reward_rate'];
                    $Lostenergy = 1;
                    $newBalance = $balance + $reward;
                    $newEnergy = $energy - $Lostenergy;

                    $this->userModel->update($user['id'], [
                        'balance' => $newBalance,
                        'last_claim' => Carbon::now()->unix(),
                        'energy' => $newEnergy
                    ]);

                    $this->insert_new_transaction($user['id'], $reward, 'Claim');

                    $downline = $user['reff_by'];
                    if(!is_null($downline)){
                        $this->RewardReferrer($user);
                    };
                }
            } else {
                return redirect()->back();
            }

        }
        return redirect()->back();
    }

    public function RewardReferrer($usrdata){
        $reward = $this->setting['reward_rate'];
        $bonus = $this->setting['reward_reff'];
        $userModel = new UsersModel();

        $rewardReff = $reward * $bonus / 100;

        $downline = $usrdata['reff_by'];
        $upline = $userModel->where('id', $downline)->first();

        $uplineBal = $upline['balance'];
        $newUplineBal = $uplineBal + $rewardReff;

        $userModel->update($downline, [
            'balance' => $newUplineBal,
        ]);

        $this->insert_new_transaction($downline, $rewardReff, 'Bonus');
    }

    private function insert_new_transaction(int $userId, float $amount, string $type)
    {
        $dataTransaction = [
            'user_id' => $userId,
            'amount' => $amount,
            'unixtime' => Carbon::now()->unix(),
            'type' => $type
        ];
        $this->transaction->insert($dataTransaction);
        return true;
    }
}
