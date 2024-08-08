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
        <!----pop ads code area---->
        <div class="layout-px-spacing">
            <!----top ads area---->
            <div class="row">
                <div class="col-sm-12 layout-spacing">
                    <!-- Start Withdrawals Area -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Withdraw</h5>
                            <form action="<?= base_url('user/withdraw'); ?>" method="POST">
                                <div class="alert alert-info text-center" style="top:10px;"><b>Available Balance <?= $balance; ?></b></div>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Withdraw</button>
                            </form>
                        </div>
                    </div>
                    <!----middle ads area---->
                    <div class="ads">
                    </div>
                </div>
                <!-- End Withdrawals Area -->
                <!-- Start Withdrawals History Area -->
                <div class="col-sm-12 layout-spacing">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-4">Withdrawals history</h5>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <td scope="col">#</td>
                                            <td scope="col">Wallet</td>
                                            <td scope="col">Method</td>
                                            <td scope="col">Amount</td>
                                            <td scope="col">Status</td>
                                            <td scope="col">Time</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!----footer ada area---->
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>