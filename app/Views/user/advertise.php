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
            <div class="ads">
                <script async="" src="https://appsha-pnd.ctengine.io/js/script.js?wkey=JJdHG4Kejc"></script>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 text-center">Create New Ads</h4>
                            <div class="alert alert-info">Your Deposit Balance <b class="text-primary">0</b> USD</div>
                            <form action="<?= base_url(''); ?>advertise/add" method="POST">
                                <label>Name</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-icon-img" name="name" minlength="1" maxlength="75" autocomplete="off" required="">
                                </div>
                                <label>Description</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="far fa-comment-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-icon-img" name="description" minlength="1" maxlength="75" autocomplete="off" required="">
                                </div>
                                <label>Url</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-link"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-icon-img" name="url" autocomplete="off" required="">
                                </div>
                                <label for="type">Type</label>
                                <div class="form-group mb-4">
                                    <select class="form-control" id="type" onchange="change_op()" name="type">
                                        <option value="1">Window</option>
                                        <option value="2">Iframe</option>
                                        <option value="3">Video</option>
                                    </select>
                                </div>
                                <label>View</label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control form-control-icon-img" name="view" min="1" autocomplete="off" required="">
                                </div>
                                <div class="form-group">
                                    <label for="option">Duration</label>
                                    <select class="form-control" id="option" name="option">
                                        <option price="0.000300" value="1">5 seconds (0.000300 USD/view, minimum 100 views)</option>
                                        <option price="0.000400" value="2">10 seconds (0.000400 USD/view, minimum 100 views)</option>
                                        <option price="0.000800" value="3">15 seconds (0.000800 USD/view, minimum 100 views)</option>
                                        <option price="0.001100" value="4">30 seconds (0.001100 USD/view, minimum 100 views)</option>
                                        <option price="0.002000" value="5">60 seconds (0.002000 USD/view, minimum 100 views)</option>
                                        <option price="0.000100" value="14">7 seconds (0.000100 USD/view, minimum 10000 views)</option>
                                    </select>
                                </div>
                                <input type="hidden" name="csrf_token_name" id="token" value="641c434a2c532e732bef8d1642d9fe62">
                                <button type="submit" class="btn btn-success btn-block">Create Campaign</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function c_price() {
                var price = $("#option").find(':selected').attr('price');
                document.getElementById('total').innerHTML = 'Price: ' + ((parseFloat(price)*document.getElementById('view').value)/1).toFixed(6) + ' USD';
            }
            function change_op() {
            var type = document.getElementById('type');
            var option = document.getElementById('option');
            if (type.value == 1) {
                var opt = '<option price="0.000300" value="1">5 seconds (0.000300 USD/view, minimum 100 views)</option><option price="0.000400" value="2">10 seconds (0.000400 USD/view, minimum 100 views)</option><option price="0.000800" value="3">15 seconds (0.000800 USD/view, minimum 100 views)</option><option price="0.001100" value="4">30 seconds (0.001100 USD/view, minimum 100 views)</option><option price="0.002000" value="5">60 seconds (0.002000 USD/view, minimum 100 views)</option><option price="0.000100" value="14">7 seconds (0.000100 USD/view, minimum 10000 views)</option>';
            }else if(type.value == 2){
                var opt = '<option price="0.000150" value="6">5 seconds (0.000150 USD/view, minimum 100 views)</option><option price="0.000300" value="7">10 seconds (0.000300 USD/view, minimum 100 views)</option><option price="0.000500" value="8">15 seconds (0.000500 USD/view, minimum 100 views)</option><option price="0.000900" value="9">30 seconds (0.000900 USD/view, minimum 100 views)</option>';
            }else{
                var opt = '<option price="0.000250" value="10">5 seconds (0.000250 USD/view, minimum 100 views)</option><option price="0.000300" value="11">10 seconds (0.000300 USD/view, minimum 100 views)</option><option price="0.000400" value="12">15 seconds (0.000400 USD/view, minimum 100 views)</option><option price="0.000900" value="13">30 seconds (0.000900 USD/view, minimum 100 views)</option>';
            }
            option.innerHTML = opt;
            c_price();
            }
        </script>
    </div>

</div>
<?= $this->endSection() ?>