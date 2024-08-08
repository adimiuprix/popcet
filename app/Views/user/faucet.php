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

            <div class="row">
                <div class="col-md-4 mb-3 mb-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="lh-1 mb-1 font-weight-bold"><span id="time">00:00</span></p>
                                    <p class="mb-0">Timer</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-clock fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="lh-1 mb-1 font-weight-bold"><?= $get_reward; ?></p>
                                    <p class="mb-0">Rewards</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-coins text-primary fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="lh-1 mb-1 font-weight-bold"><?= $energy; ?></p>
                                    <p class="mb-0">Limit</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-fire text-primary fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-sm-12 layout-spacing">
                    <div class="alert alert-info text-center"><b>You can claim fauchet unlimited!...</b></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('faucet-run'); ?>" method="POST">
                                    <div class="text-center">
                                        <div class="row justify-content-center text-center">
                                            <div class="cf-turnstile" data-sitekey="<?= env('CF_SITE_KEY') ?>" data-theme="light"></div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-link">Claim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Timestamps
    var unixTime = Math.floor(Date.now() / 1000);
    var claimTime = <?= $CanClaimTime; ?>;

    // Menghitung selisih waktu
    var difference = claimTime - unixTime;

    // Fungsi untuk mengonversi selisih waktu ke format countdown (00:00)
    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        var remainingSeconds = seconds % 60;
        return (minutes < 10 ? "0" : "") + minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
    }

    var countdownElement = document.getElementById('time');

    // Timer Countdown
    var countdownInterval = setInterval(function() {
        if (difference <= 0) {
            clearInterval(countdownInterval);
            countdownElement.textContent = "Ready";
        } else {
            countdownElement.textContent = formatTime(difference);
            difference--;
        }
    }, 1000);
</script>
<?= $this->endSection() ?>