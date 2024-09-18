<?php

namespace App\Controllers;
use App\Controllers\Utility\FuncMain;
use App\Models\UsersModel;
use App\Models\TransactionModel;
use App\Models\SeoModel;

class Home extends BaseController
{
    protected $seo;
    protected $userModel;
    protected $utility;

    public function __construct()
    {
        // $this->session->set('email', 'tronvego@gmail.com');
        // $this->session->remove('email');
        $this->seo = new SeoModel();
        $this->userModel = new UsersModel();
        $this->utility = new FuncMain();
    }

    public function index(): string
    {
        $adstera = $this->seo->where('title', 'adstera')->get()->getRowObject();

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
                'adstera_tag' => $adstera->meta_data,
                'session' => $session,
                'tot_users' => $tot_users,
                'payouts' => $payouts
            ]);

        // Render view dengan data
        return view('home', $data);
    }

    public function blog(): string
    {
        $session = $this->session->get('email');
        return view('blog', compact('session'));
    }

    public function blog_detail(): string
    {
        $session = $this->session->get('email');
        return view('blog_detail', compact('session'));
    }

    public function privacy(): string
    {
        $session = $this->session->get('email');
        return view('privacy', compact('session'));
    }

    public function cookie(): string
    {
        $session = $this->session->get('email');
        return view('cookie', compact('session'));
    }
}
