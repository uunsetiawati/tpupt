<!-- App Capsule -->
<div id="appCapsule">
    <!-- tab content -->
    <div class="section full mb-2">
        <div class="tab-content">
            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <?php $this->view("message") ?>
                    <div class="row">
                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= site_url('laporan') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/folder-link.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= site_url('laporan') ?>">
                                        LAPORAN TENAGA PENDAMPING
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url("laporan/statistik") ?>">
                                    
                                        <img src="<?= base_url("") ?>/assets/img/icon/star-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url("laporan/statistik") ?>">
                                        STATISTIK LAPORAN
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('pengaturan/setPassword') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/user-file.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('pengaturan/setPassword') ?>">
                                        SET PASSWORD
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * feed -->
        </div>
    </div>
    <!-- * tab content -->

</div>
<!-- * App Capsule -->