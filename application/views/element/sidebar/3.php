<ul class="listview flush transparent no-line image-listview mt-2">
    <li>
        <a href="<?= site_url('dashboard'); ?>" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="home-outline"></ion-icon>
            </div>
            <div class="in">
                Beranda
            </div>
        </a>
    </li>
    <li>
        <a href="<?= site_url('laporan') ?>" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="map"></ion-icon>
            </div>
            <div class="in">
                LAPORAN TENAGA PENDAMPING
            </div>
        </a>
    </li>

    <li>
        <a href="<?= site_url('laporan/statistik?wilayah_kerja=12&tahun=2023&bulan=01') ?>" class="item">
            <div class="icon-box bg-primary">
                <ion-icon name="layers-outline"></ion-icon>
            </div>
            <div class="in">
                STATISTIK LAPORAN TP
            </div>
        </a>
    </li>

</ul>