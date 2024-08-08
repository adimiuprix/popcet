<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class FuncMain extends BaseController
{
    public function __construct()
    {
        // Inisialisasi UserModel
        $this->userModel = new UsersModel();
    }

    public function tot_users(){
        $tot_user = $this->userModel->countAll();
        return $tot_user;
    }

    public function tot_withdraw(){
        $tot_user = $this->userModel->countAll();
        return $tot_user;
    }

}
