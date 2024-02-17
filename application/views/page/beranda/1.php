<!-- App Capsule -->
<div id="appCapsule">
    <!-- <script src="https://cdn.logwork.com/widget/countdown.js"></script>
    <a href="https://logwork.com/countdown-x6ge" class="countdown-timer" data-style="flip3" data-timezone="Asia/Jakarta" data-date="2023-01-10 00:00">Waktu Pendaftaran Device</a> -->
    <!-- * App Capsule -->
    <div class="section mt-2">
        <div class="card text-center">
            <h2 class="text-info">Leaderboard Tenaga Pendamping</h2>
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
                    <?php if ($device->num_rows() == null) { ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ion-icon name="warning-outline"></ion-icon>
                            Device ini belum terdaftar
                        </div>
                    <?php } ?>
                    <?php $this->view("message") ?>
                    <div class="row">
                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= site_url('kunjungan/checkin') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/maps-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= site_url('kunjungan/checkin') ?>">
                                        KUNJUNGAN
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('kunjungan/data') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/folder-link.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('kunjungan/data') ?>">
                                        DATA
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url("kunjungan/addlaporan") ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/text-folder.png" alt="" width="100%">
                                    </a>
                                    <p align="center">
                                        <a href="<?= base_url("kunjungan/addlaporan") ?>">
                                            LAPORAN
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
                                        RENCANA KERJA
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('pengaturan/setDevice') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/key-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('pengaturan/setDevice') ?>">
                                        PERANGKAT
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
                <br>
                <div class="section full mb-3">
                    <div class="section-title">
                        <h2>Like dan Follow Setiap Kegiatannya Ya</h2>
                    </div>
                    <div class="carousel-single owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1033px, 0px, 0px); transition: all 0s ease 0s; width: 3161px; padding-left: 30px; padding-right: 30px;">
                                <?php foreach ($ig->result() as $key => $data) {; ?>
                                    <div class="owl-item" style="width: 361.6px; margin-right: 16px;">
                                        <div class="item">
                                            <blockquote class="instagram-media" data-instgrm-permalink="<?= $data->url ?>?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                                                <div style="padding:16px;"> <a href="<?= $data->url ?>?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                                                        <div style=" display: flex; flex-direction: row; align-items: center;">
                                                            <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div>
                                                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div>
                                                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>
                                                            </div>
                                                        </div>
                                                        <div style="padding: 19% 0;"></div>
                                                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                                                        <g>
                                                                            <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg></div>
                                                        <div style="padding-top: 8px;">
                                                            <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div>
                                                        </div>
                                                        <div style="padding: 12.5% 0;"></div>
                                                        <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                                            <div>
                                                                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                                                                <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                                                                <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div>
                                                            </div>
                                                            <div style="margin-left: 8px;">
                                                                <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                                                                <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                                                            </div>
                                                            <div style="margin-left: auto;">
                                                                <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                                                                <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                                                                <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                                                            </div>
                                                        </div>
                                                        <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div>
                                                            <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div>
                                                        </div>
                                                    </a>
                                                    <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="<?= $data->url ?>?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by UPT Pelatihan KUKM Jatim (@uptkukmjatim)</a></p>
                                                </div>
                                            </blockquote>
                                            <script async src="//www.instagram.com/embed.js"></script>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <?php if ($kunjungan->num_rows() > 0) { ?>
                        <br>
                        <div class="card text-white bg-info mb-2">
                            <div class="card-body">
                                <h5 class="card-title">Terima Kasih, <?= $this->session->nama ?></h5>
                                <h6 class="card-title">Bulan ini, anda telah melakukan pendampingan dengan estimasi sejauh <?= $total_jarak ?> km </h6>
                                <p class="card-text">Sebuah kebanggan bagi Indonesia telah memilihmu yang senantiasa berjuang melakukan pendampingan demi kamajuan gerakan Koperasi / pelaku UKM dengan setulus hati. Semoga menjadi amal dan jariyah dari kita untuk bangsa dan negara.</p>
                            </div>
                        </div>
                        <div class="card text-center">
                            <img class="imaged w250" src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $center ?>&zoom=12&scale=10&size=1200x500&maptype=roadmap&format=jpg&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A&<?= $markers ?>" alt="Google map of -7.8081176,112.0413752" />
                        </div>
                    <?php } ?>
                </div>
                <!-- * feed -->
            </div>
        </div>
        <div class="section full mt-2 mb-2">
            <div class="section-title">
                <h1>Statistik Kunjungan</h1>
            </div>
            <ul class="listview image-listview media mb-2">
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>
                                <h3>Kunjungan Ke Lainnya : <?= $k_lainnya->num_rows() ?></h3>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>
                                <h3>Kunjungan Ke Koperasi : <?= $k_koperasi->num_rows() ?></h3>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>
                                <h3>Kunjungan Ke UKM : <?= $k_ukm->num_rows() ?></h3>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>
                                <h3>Terlambat/Tidak Absen : <?= $k_terlambat->num_rows() ?></h3>
                                <small>(Total sejumlah <?= $k_terlambat_total->num_rows() ?> tahun ini)</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item">
                        <div class="in">
                            <div>
                                <h3>Izin : <?= $k_izin->num_rows() ?></h3>
                                <small>(Total sejumlah <?= $k_izin_total->num_rows() ?> tahun ini)</small>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <?php if ($s_izin->num_rows() == null) { ?>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Izin Hari Ini ?')" href="<?= base_url("kunjungan/izin") ?>" id="btn-izin" class="btn btn-danger btn-block"><ion-icon name="medkit-outline"></ion-icon> IZIN UNTUK HARI INI</a>
            <?php } ?>
        </div>
    </div>
    <!-- * App Capsule -->
</div>