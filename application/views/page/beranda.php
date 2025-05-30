<!-- App Capsule -->
<div id="appCapsule">

    <!-- tab content -->
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">


                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= site_url('kunjungan/addcheckinn') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/maps-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= site_url('kunjungan/addcheckinn') ?>">
                                        KUNJUNGAN
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('laporan') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/folder-link.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('laporan') ?>">
                                        LAPORAN
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('laporan/cetaklaporan') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/text-folder.png" alt="" width="100%">
                                    </a>
                                    <p align="center">
                                        <a href="<?= base_url('laporan/cetaklaporan') ?>">
                                            CETAK LAPORAN
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('target') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/pencil-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('target') ?>">
                                        TARGET KERJA
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