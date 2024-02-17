<!-- App Capsule -->
<div id="appCapsule">

    <div class="login-form">
        <div class="section">
            <h1>TAMBAH DEVICE</h1>
            <h4>Klik untuk Mendaftarkan Perangkat</h4>
        </div>
        <div class="section mb-5">
            <p>Kuota Device Tersedia <?= 5 - $row->num_rows() ?></p>
            <?php $this->view("message")?>
            <br>
            <input type="text" value="Token : <?= sha1($this->agent->agent_string()) ?>" class="form-control" readonly>
            <br>
            <input type="text" value="Platform : <?= $this->agent->platform() ?>" class="form-control" readonly>
            <br>
            <input type="text" value="Merek : <?= $this->agent->mobile() == null ? "Ini perangkat Dekstop" : $this->agent->mobile() ?>" class="form-control" readonly>
            <br>
            <input type="text" value="Basis Browser : <?= $this->agent->browser() ?>" class="form-control" readonly>
            <br>
            <a href="<?= base_url("pengaturan/saveDevice")?>" onclick="return confirm('Apakah Anda Yakin Ingin Mendaftarkan Perangkat Ini ?')" class="btn btn-success btn-block btn-lg">
                <ion-icon name="key-outline"></ion-icon> Daftarkan Perangkat Ini
            </a>
            <div class="section-title">*Setiap user hanya diperbolehkan mendaftarkan 5 perangkat, baik Laptop maupun Smartphone. Silahkan login pada device yang anda gunakan sampai hingga batas waktu pendaftaran device berakhir.</div>
        </div>
        <div class="section mt-2">
            <h4>List Device</h4>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Device</th>
                        <th scope="col">Token</th>
                        <th scope="col">Browser</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) {;
                    ?>
                        <tr>
                            <td scope="row">
                                <p><?= $data->platform ?></p>
                            </td>
                            <td>
                                <?= sha1($data->token) ?>
                            </td>
                            <td>
                                <?= $data->browser ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <br>
        </div>
    </div>


</div>
<!-- * App Capsule -->