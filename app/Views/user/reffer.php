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
            <!----top ads area---->
            <div class="row">
                <div class="col-sm-12 layout-spacing">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4 text-center">Get 10% Commission for life!</h5>
                            <div class="copy-text">
                                <input type="text" class="text" value="<?= $refcode; ?>">
                                <button>Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----footer ads area---->
        <script type="text/javascript">
            let copyText = document.querySelector(".copy-text");
            copyText.querySelector("button").addEventListener("click", function() {
                let input = copyText.querySelector("input.text");
                input.select();
                document.execCommand("copy");
                copyText.classList.add('active');
                window.getSelection().removeAllRanges();
                setTimeout(function() {
                    copyText.classList.remove('active');
                }, 1500);
            });
        </script>
    </div>

</div>
<?= $this->endSection() ?>