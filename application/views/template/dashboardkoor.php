<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title> .:: KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR ::.</title>
    <meta name="description" content="KITAPKU APPS - APLIKASI MONITORING TENAGA PENDAMPING JAWA TIMUR MADE WITH LOVE BY UPTKUKM.ID">
    <meta name="keywords" content="uptkukm, upt, uptkukmjatim, tenaga pendamping jawa timur" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="manifest" href="__manifest.json">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.logwork.com/widget/countdown.js"></script>

    <!-- Datatable CSS -->
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <style>
        .error {color: #FF0000;}
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

        .card-header {
            height: 170px;
            overflow: hidden;
            margin: 10px;
            position: relative;
        }
    </style>
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <?=strtoupper($title)?>
        </div>
        <div class="right">
            <a href="<?=site_url('auth/logout');?>" class="headerButton">
                <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="log-out-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

  
    <!-- App Content -->
    <?=$contents?>
    <!-- * App Content -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">

        <a href="<?=site_url('kunjungan/checkin');?>" class="item">
            <div class="col">
                <ion-icon name="map-outline"></ion-icon>
            </div>
        </a>
        <a href="<?=site_url('dashboard');?>" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">                
                <ion-icon name="information-circle-outline"></ion-icon>
            </div>
        </a>
        
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="<?=base_url()?>/assets/img/favicon.png" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?= $this->session->nama?></strong>
                            <div class="text-muted">
                                <ion-icon name="location" role="img" class="md hydrated" aria-label="location"></ion-icon>
                                IP : <?= $this->input->ip_address()?>
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="<?=site_url('dashboard');?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Beranda
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?=site_url('kunjungan/checkin')?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="map"></ion-icon>
                                </div>
                                <div class="in">
                                    DATA PENDAMPING
                                </div>
                            </a>
                        </li>
                        
                    </ul>

                    
                    </ul>

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="javascript:;" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>                    
                    <a href="<?=site_url('auth/logout');?>" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="<?= base_url() ?>/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="<?= base_url() ?>/assets/js/lib/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="<?= base_url() ?>/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="<?= base_url() ?>/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="<?= base_url() ?>/assets/js/base.js"></script>
    


    

</body>

</html>