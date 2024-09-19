<?php

namespace App\Controllers;
use App\Controllers\Utility\FuncMain;
use App\Models\UsersModel;
use App\Models\TransactionModel;
use App\Models\SettingModel;


class Home extends BaseController
{
    protected $userModel;
    protected $setting_model;
    protected $utility;

    public function __construct()
    {
        // $this->session->set('email', 'tronvego@gmail.com');
        // $this->session->remove('email');
        $this->userModel = new UsersModel();
        $this->utility = new FuncMain();
        $this->setting_model = (new SettingModel())->first();
    }

    public function index(): string
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];

        // Ambil data session yang diperlukan untuk view
        $session = $this->session->get('email');

        $tot_users = $this->utility->tot_users();

        $payouts = (new TransactionModel())
            ->join('users', 'users.id = transactions.user_id', 'left')
            ->orderBy('transactions.id', 'DESC')
            ->limit(10)
            ->get()
            ->getResult();

            $data = array_merge([
                'adstera_tag' => $this->adstera->meta_data,
                'session' => $session,
                'tot_users' => $tot_users,
                'payouts' => $payouts
            ], [
                'sitename' => $sitename,
                'keywords' => $keywords,
                'description' => $description
            ]);

        // Render view dengan data
        return view('home', $data);
    }

    public function blog(): string
    {
        $session = $this->session->get('email');

        $data = [
            'adstera_tag' => $this->adstera->meta_data,
            'session' => $session,
        ];

        return view('blog', $data);
    }

    public function blog_detail(): string
    {
        $session = $this->session->get('email');

        $data = [
            'adstera_tag' => $this->adstera->meta_data,
            'session' => $session,
        ];

        return view('blog_detail', $data);
    }

    public function privacy(): string
    {
        $session = $this->session->get('email');

        $data = [
            'adstera_tag' => $this->adstera->meta_data,
            'session' => $session,
        ];

        return view('privacy', $data);
    }

    public function cookie(): string
    {
        $session = $this->session->get('email');

        $data = [
            'adstera_tag' => $this->adstera->meta_data,
            'session' => $session,
        ];

        return view('cookie', $data);
    }
}
