<html lang="en" class="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title><?= sitename();?></title>
        <?= $adstera_tag; ?>
        <link rel="icon" type="image/x-icon" href="<?= assets('assets/images/favicon.ico');?>" />
        <link href="<?= assets('public/template/css/fontawesome.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?= assets('public/template/dashboard/plugins.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?= assets('public/template/css/elements/alert.css');?>" rel="stylesheet" type="text/css">
        <link href="<?= assets('public/template/css/dashboard/dash.css');?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= assets('public/template/css/tables/table-basic.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?= assets('public/template/css/components/custom-sweetalert.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?= assets('public/template/css/styles.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?= assets('public/template/css/components/tabs-accordian/custom-tabs.css');?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" referrerpolicy="no-referrer">
        <!-- Bootstrap Css -->
        <link href="<?= assets('public/template/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
        <link href="<?= assets('public/template/dashboard/main.css');?>" rel="stylesheet" type="text/css">
        <link href="<?= assets('public/template/dashboard/structure.css');?>" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Cloudflare -->
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" defer></script>
    </head>
    <body class="no-touch nk-nio-theme chrome">
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm" style="height:64px; margin:-0px;">
                <ul class="navbar-item theme-brand flex-row  text-center">
                    <a class="navbar-brand" href="<?= base_url('/')?>" data-active="true">
                        <img src="<?= assets('assets/images/logo.png')?>" alt="logo" class="img-fluid" style="max-width: 42px;">
                    </a>
                </ul>
                <ul class="navbar-item flex-row ml-md-auto" style="padding: 10px;">
                    <li class="nav-item dropdown user-profile-dropdown">
                        <div class="dropdown d-inline-block" id="notifications">
                            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </a>
                        </div>
                    </li>
                </ul>
            </header>
        </div>

        <?= $this->renderSection('content'); ?>

        <!----footer ads---->
        <div id="miniFooterWrapper" class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mx-auto col-lg-12 col-md-6 site-content-inner text-center copyright align-self-center">
                        <p class="mt-md-0 text-blue mt-4 mb-0">Copyright © 2024 <a class="text-success" href="<?= sitename();?>" data-active="true">Sweet Claim</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="login" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="user" action="<?= base_url('authorize')?>" method="POST">
                        <div class="modal-body">
                            <div style="font-size:14px;" class="alert alert-danger text-center">
                                <b>Multiple accounts, Bot, VPN, and Proxies are not allowed! If you do any of the above, Your account will be permanently banned.</b>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your FaucetPay Email Address" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="row justify-content-center text-center">
                                <div class="cf-turnstile" data-sitekey="<?= env('CF_SITE_KEY') ?>" data-theme="light"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="d-flex align-items-center btn btn-outline border text-secondary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script src="<?= assets('public/template/dashboard/perfect-scrollbar/perfect-scrollbar.min.js');?>"></script>
        <script src="<?= assets('public/template/js/app.js');?>"></script>
        <script src="<?= assets('styles/js/bootstrap.bundle.min.js');?>"></script>
        <script src="<?= assets('styles/vendor/wow/wow.min.js');?>"></script>
        <script src="<?= assets('styles/vendor/owl-carousel/js/owl.carousel.min.js');?>"></script>
        <script src="<?= assets('styles/vendor/waypoints/jquery.waypoints.min.js');?>"></script>
        <script src="<?= assets('styles/vendor/animateNumber/jquery.animateNumber.min.js');?>"></script>
        <script src="<?= assets('styles/js/google-maps.js');?>"></script>
        <script src="<?= assets('styles/js/theme.js');?>"></script>
        <script src="<?= assets('assets/js/validate.js');?>"></script>
        <script src="<?= assets('assets/js/scripts.js');?>"></script>
        <script type="text/javascript">
            var site_url = "<?= base_url(''); ?>";
            $(document).ready(function() {
                App.init();
            });
            $("a[href='<?= base_url().ltrim(request()->getUri()->getPath(), '/') ?>']").attr('data-active', 'true');
        </script>

        <script>
        <?php if (session()->getFlashdata('alert') === 'success'): ?>
            Swal.fire({
                title: 'Success!',
                text: 'Claim successfully.',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('alert') === 'failed'): ?>
            Swal.fire({
                title: 'Error!',
                text: 'timer cooldown.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('alert') === 'n_energy'): ?>
            Swal.fire({
                title: 'Energy cooldown!',
                text: 'Empty energy, come back tomorow.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            });
        <?php endif; ?>
        </script>
    </body>
</html>