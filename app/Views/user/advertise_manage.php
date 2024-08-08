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
                <div class="col-lg-12 layout-spacing">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title mb-4">Manage your campaigns</h4>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <td scope="col">Name</td>
                                            <td scope="col">Description</td>
                                            <td scope="col">Url</td>
                                            <td scope="col">Price</td>
                                            <td scope="col">Timer</td>
                                            <td scope="col">Views</td>
                                            <td scope="col">Total View</td>
                                            <td scope="col">Status</td>
                                            <td scope="col">Action</td>
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
    </div>

</div>
<?= $this->endSection() ?>