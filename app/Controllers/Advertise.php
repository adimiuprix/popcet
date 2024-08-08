<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Advertise extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function ads_index()
    {
        $data = 'aaaaaaaaaaaaaaaaaa';
        return $this->loadView('user/advertise', compact('data'));
    }

    public function ads_create()
    {
        return $this->loadView('user/reffer', compact('data'));
    }

    public function ads_manage()
    {
        $data = "ffffffffffff";
        return $this->loadView('user/advertise_manage', compact('data'));
    }

    public function ads_deposit()
    {
        $data = "ffffffffffffffff";
        return $this->loadView('user/advertise_deposit', compact('data'));
    }

    private function loadView($view, $compact = [])
    {
        $session = $this->session->get('email');
        $data = array_merge(compact('session'), $compact);

        return view($view, $data);
    }

}
