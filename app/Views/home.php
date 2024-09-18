<?= $this->extend('layouts') ?>
<?= $this->section('content') ?>
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!-- Sidebar Menu -->
    <?= $this->include('segments/sidebar'); ?>

    <div id="content" class="main-content">
        <div class="col-sm-12">
            <div class="page-header">
            </div>
        </div>
        <div class="layout-px-spacing">
            <!----top ad----->
            <div class="row">
                <div class="col-sm-12 layout-spacing">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 style="font-size:2rem;" class="font-weight-bold mb-4 text-primary"><?= sitename();?></h2>

                            <?php if (session()->getFlashdata('errors')): ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <p><?= esc($error) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success">
                                    <p><?= esc(session()->getFlashdata('success')) ?></p>
                                </div>
                            <?php endif; ?>

                            <p class="font-weight-bold mb-4 text-center"></p>
                            <!----description area---->
                            <img class="wow fadeInUp" width="50" height="50" src="assets/images/currencies/ton-icon.webp">
                            <div class="action-btns mt-4">
                                <ul class="list-inline text-center align-items-center">
                                    <?php if($session == null): ?>
                                    <li class="list-inline-item">
                                        <a type="button" data-toggle="modal" data-target="#login" class="d-flex align-items-center btn btn-outline border text-secondary" style="border-radius:7px;">
                                            <div class="download-text text-left">
                                                <span class="mb-0">Login / Register</span>
                                            </div>
                                        </a>
                                    </li>
                                    <!----login button bottom ad area---->
                                    <?php else: ?>
                                    <li class="list-inline-item">
                                        <a href="<?= base_url('withdraw'); ?>" class="d-flex align-items-center btn btn-outline border text-primary" style="border-radius:7px;">
                                            <div class="download-text text-left pl-1">
                                                <span class="mb-0">Withdraw</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?= base_url('logout'); ?>" class="d-flex align-items-center btn btn-outline border text-secondary" style="border-radius:7px;">
                                            <div class="download-text text-left pl-1">
                                                <span class="mb-0">Logout</span>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Blogs  Area -->
            </div>
            <!-- End Blogs  Area -->
            <!----all payout history start---->
            <div class="row text-center">
                <div class="col-sm-12 layout-spacing">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4>All <span class="marked text-primary">Payout</span> History</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Wallet</td>
                                            <td scope="col">Amount</td>
                                            <td scope="col">Type</td>
                                            <td scope="col">Time</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $numb = 1;?>
                                        <?php foreach($payouts as $pay):?>
                                        <tr>
                                            <td><?= $numb++;?></td>
                                            <td><?= mask_email($pay->email);?></td>
                                            <td><?= $pay->amount;?></td>
                                            <td><?= $pay->type;?></td>
                                            <td><?= hmn_time($pay->unixtime);?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 layout-spacing">
                    <div style="height:150px;" class="card text-center">
                        <div class="card-header bg-info">
                            <span class="color-primary count-number"><?= $tot_users; ?></span>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-users fa-2x text-info"></i>
                            <h6>Happy Users</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 layout-spacing">
                    <div style="height:150px;" class="card text-center">
                        <div class="card-header bg-success">
                            <span class="color-primary count-number">470,071+</span>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            <h6>Withdrawals</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 layout-spacing">
                    <div style="height:150px;" class="card text-center">
                        <div class="card-header bg-primary">
                            <span class="color-primary count-number">27,297+</span>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-newspaper fa-2x text-primary"></i>
                            <h6>Offers Claimed</h6>
                        </div>
                    </div>
                </div>
                <!----live online users area---->
            </div>
            <!----all payout history end---->
        </div>
    </div>

</div>
<?= $this->endSection() ?>