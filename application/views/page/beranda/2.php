<!-- App Capsule -->
<div id="appCapsule">
    <!-- * App Capsule -->
    <div class="section mt-2">
        <div class="card text-center">
            <h2 class="text-info">Tenaga Pendamping Teraktif</h2>
            <ul class="listview image-listview">
                <?php $no = "1";
                foreach ($leaderboard->result() as $key => $data) { ?>
                    <li>
                        <div class="item">
                            <!-- <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image"> -->
                            <h3><?= $no++ ?></h3>
                            <div class="in">
                                <div><?= $this->fungsi->nama($data->user_id) ?></div>
                                <span class="badge badge-primary">Poin : <?= $data->total_score ?></span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
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
                                    <a href="<?= base_url('laporan') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/ribbon-badge-folder.png" alt="" width="100%">
                                    </a>
                                    <p align="center">
                                        <a href="<?= base_url('laporan') ?>">
                                            ACC LAPORAN
                                        </a>
                                    </p>
                                </div>
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