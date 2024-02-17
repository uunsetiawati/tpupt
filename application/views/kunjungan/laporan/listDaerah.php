<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>LAPORAN TENAGA PENDAMPING</h3>
                    <h2><?= $wilayah_kerja ?> (<?= $bulan ?>/<?= $tahun ?>)</h2>
                    <?php $this->view("message") ?>
                    <a href="<?=site_url('laporan/listDaerahTahun')?>">
                    <button type="button" class="btn btn-primary btn-block">Filter Berdasarkan Tahun</button>
                    </a>
                    <div class="card">
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" name="id" value="<?= $this->session->id ?>">
                                <div class="input-group mb-3">
                                    <select name="kota" class="btn btn-outline-primary ">
                                        <option value="">Pilih Kabupaten / Kota</option>
                                        <?php
                                        $this->db->order_by('id', 'ASC');
                                        foreach ($this->fungsi->pilihan("tb_lembaga")->result() as $key => $pilihan) {;
                                        ?>
                                            <option value="<?= $pilihan->id ?>"><?= $pilihan->kota ?></option>
                                        <?php } ?>
                                    </select>
                                    <select name="bulan" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <select name="tahun" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Tahun</option>
                                        <?php $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2022; $x--) { ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                                    <a href="<?= base_url("") ?>" class="btn btn-info float-right">Kembali <i class="fa fa-fw fa-angle-double-left" aria-hidden="true"></i></a>
                                    <a href="<?= base_url("laporan/belumLogin") ?>" class="btn btn-outline-info" target="_blank">Lihat yang belum login <i class="fa fa-eye"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Nama Tenaga Pendamping</th>
                                                <th width="10%">Asal</th>
                                                <th width="10%">Bidang</th>
                                                <th width="10%">Estimasi Jarak</th>
                                                <th width="10%">Kunjungan Koperasi</th>
                                                <th width="10%">Kunjungan UKM</th>
                                                <th width="10%">Kunjungan Lainnya</th>
                                                <th width="10%">Total Kunjungan</th>
                                                <th width="10%">Total Izin</th>
                                                <th width="10%">Total Terlambat</th>
                                                <th width="10%">Total Poin</th>
                                                <!-- <th width="15%">Rencana Kerja</th> -->
                                                <th width="20%">Laporan Bulan Ini</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($row->result() as $key => $data) {;
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <p><?= $no++ ?></p>
                                                    </td>
                                                    <td>
                                                        <?= $data->nama ?>
                                                        <?= $this->fungsi->pilihan_advanced("tb_device", "user_id", $data->id)->num_rows() == null ? "<span class='badge badge-danger'>Belum mendaftarkan Device</span>" : "<span class='badge badge-success'>Sudah Daftar</span>" ?>
                                                    </td>
                                                    <td>
                                                        <?= $this->fungsi->pilihan_selected("tb_lembaga", $data->wilayah_kerja)->row("kota") ?>
                                                    </td>
                                                    <td>
                                                        <?= $data->bidang ?>
                                                    </td>
                                                    <td>
                                                        <?= $this->fungsi->totalJarak($data->id) ?>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_izin", "user_id", $data->id, "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_late", "user_id", $data->id, "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <?= $this->fungsi->getPoin($data->id, $tahun, $bulan)->row("poin") ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_target", "created", $tahun . "-" . $bulan, $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("target/perintah?aksi=download&tahun=2023&token=" . base64_encode($data->id)) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download"></i> Download RK</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td> -->
                                                    <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_laporan", "created", $tahun . "-" . $bulan, $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=surat_tugas&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Surat Tugas</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=sppd&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> SPPD</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=surat_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Kunjungan</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=laporan_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Laporan Kunjungan</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('laporan/detailTP/' . $data->id) ?>" class="btn btn-primary btn-sm"><ion-icon name="eye-outline"></ion-icon></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- * App Capsule -->