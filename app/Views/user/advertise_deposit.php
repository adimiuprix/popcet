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
                <div class="col-lg-12 layout-spacing">
                    <div class="card">
                        <div class="card-header alert-bg bg-primary">
                            <h4 class="card-title text-center text-white">Deposit</h4>
                        </div>
                        <div class="card-body">
                            <form action="" id="depForm" method="POST" autocomplete="off">
                                <input type="hidden" name="csrf_token_name" value="641c434a2c532e732bef8d1642d9fe62">
                                <div class="form-group">
                                    <label>Amount :</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2 currency-value">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">USD</span>
                                                </div>
                                                <input type="number" name="amount" id="usd" class="form-control" min="0.5" step="0.000001">
                                            </div>
                                        </div>
                                    </div>
                                    <small id="minDep"></small>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="method" id="method">
                                        <option selected="" disabled="">Select Method</option>
                                        <option value="faucetpay">FaucetPay</option>
                                    </select>
                                </div>
                                <div id="fpCurrency">
                                    <div class="form-group">
                                        <label for="option">Currency</label>
                                        <select class="form-control" id="currency2" name="currency2">
                                            <option value="BTC">BTC</option>
                                            <option value="LTC">LTC</option>
                                            <option value="USDT">USDT</option>
                                            <option value="TRX">TRX</option>
                                            <option value="BNB">BNB</option>
                                            <option value="DOGE">DOGE</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="merchant_username" value="rafiqcoinlink">
                                    <input type="hidden" name="item_description" value="Deposit to Sweet Claim">
                                    <input type="hidden" name="currency1" value="USDT">
                                    <input type="hidden" name="amount1" value="1">
                                    <input type="hidden" name="custom" value="6434">
                                    <input type="hidden" name="callback_url" value="<?= base_url(''); ?>wh/faucetpay">
                                    <input type="hidden" name="success_url" value="<?= base_url(''); ?>deposit?success=true">
                                    <input type="hidden" name="cancel_url" value="<?= base_url(''); ?>deposit?success=false">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success btn-block">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 layout-spacing">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-4">Deposit history</h4>
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <td scope="col">Code</td>
                                            <td scope="col">Status</td>
                                            <td scope="col">Amount</td>
                                            <td scope="col">Time</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#token").keypress(() => {
            setTimeout(() => {
                let usd = parseFloat($("#token").val()) * rate;
                $("#usd").val(usd);
                $("input[name=amount1]").val(usd);
            }, 50);
            });
            $("#usd").keypress(() => {
            setTimeout(() => {
                let token = parseFloat($("#usd").val()) / rate;
                $("#token").val(token.toFixed(3));
                $("input[name=amount1]").val($("#usd").val());
            }, 50);
            });
            function formUpdate() {
            $("#depForm").attr("action", methods[$("#method").val()].url);
            $("#usd").attr("min", methods[$("#method").val()].min);
            $("#minDep").text(
                `Minimum deposit is ${methods[$("#method").val()].min} USD`
            );
            if ($("#method").val() === "faucetpay") {
                $("#fpCurrency").css("display", "block");
            } else {
                $("#fpCurrency").css("display", "none");
            }
            }
            $("#method").change(function () {
            formUpdate();
            });
            formUpdate();
        </script>
        <script>
            var rate = 1;
            var methods = {
                faucetpay: {
                    url: 'https://faucetpay.io/merchant/webscr',
                    min: 0.01        },
                coinbase: {
                    url: '<?= base_url('/'); ?>deposit/coinbase',
                    min: 0.5        },
            }
        </script>
    </div>

</div>
<?= $this->endSection() ?>