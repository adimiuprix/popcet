<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UsersModel;
use App\Models\SettingModel;
use Carbon\Carbon;

class FaucetModel extends Model
{
    protected $UsersModel;
    protected $settingModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->settingModel = new SettingModel();
    }

    public function refresh_energy():void
    {
        $timeNow = Carbon::now()->unix();
        $time24HoursAgo = $timeNow - 86400;
        $energy = $this->settingModel->energyRecharge();

        $users = $this->UsersModel
            ->where('last_claim <=', $time24HoursAgo)
            ->findAll();

        foreach ($users as $user) {
            $this->UsersModel->update($user['id'], ['energy' => $energy]);
        }
    }
};