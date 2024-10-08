<?php

namespace App\Controllers;
use App\Controllers\Utility\FuncMain;
use App\Models\UsersModel;
use App\Models\TransactionModel;
use App\Models\SettingModel;
use App\Models\AdsteraModel;

class Home extends BaseController
{
    protected $userModel;
    protected $setting_model;
    protected $utility;
    protected $social_bar;

    public function __construct()
    {
        // $this->session->set('email', 'tronvego@gmail.com');
        // $this->session->remove('email');
        $this->userModel = new UsersModel();
        $this->utility = new FuncMain();
        $this->setting_model = (new SettingModel())->first();
        $this->popunder = (new AdsteraModel())->where('type', 'popunder')->get()->getFirstRow();
        $this->social_bar = (new AdsteraModel())->where('type', 'social_bar')->get()->getFirstRow();
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
                'session' => $session,
                'tot_users' => $tot_users,
                'payouts' => $payouts
            ], [
                'sitename' => $sitename,
                'keywords' => $keywords,
                'description' => $description,
                'popunder' => $this->popunder->meta_data,
                'social_bar' => $this->social_bar->meta_data,
            ]);

        // Render view dengan data
        return view('home', $data);
    }

    public function blog(): string
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];

        $session = $this->session->get('email');

        $data = array_merge([
            'session' => $session,
        ], [
            'sitename' => $sitename,
            'keywords' => $keywords,
            'description' => $description,
            'popunder' => $this->popunder->meta_data,
            'social_bar' => $this->social_bar->meta_data,
        ]);

        return view('blog', $data);
    }

    public function blog_detail(): string
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];

        $session = $this->session->get('email');

        $data = array_merge([
            'session' => $session,
        ], [
            'sitename' => $sitename,
            'keywords' => $keywords,
            'description' => $description,
            'popunder' => $this->popunder->meta_data,
            'social_bar' => $this->social_bar->meta_data,
        ]);

        return view('blog_detail', $data);
    }

    public function privacy(): string
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];

        $session = $this->session->get('email');

        $data = array_merge([
            'session' => $session,
        ], [
            'sitename' => $sitename,
            'keywords' => $keywords,
            'description' => $description,
            'popunder' => $this->popunder->meta_data,
            'social_bar' => $this->social_bar->meta_data,
        ]);

        return view('privacy', $data);
    }

    public function cookie(): string
    {
        $sitename = $this->setting_model['sitename'];
        $keywords = $this->setting_model['keyword'];
        $description = $this->setting_model['description'];

        $session = $this->session->get('email');

        $data = array_merge([
            'session' => $session,
        ], [
            'sitename' => $sitename,
            'keywords' => $keywords,
            'description' => $description,
            'popunder' => $this->popunder->meta_data,
            'social_bar' => $this->social_bar->meta_data,
        ]);

        return view('cookie', $data);
    }
}
