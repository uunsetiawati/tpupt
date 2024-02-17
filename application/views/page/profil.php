<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">
        <div class="profile-head">
            <div class="avatar">
                <img src="<?= base_url() ?>/assets/img/favicon.png" alt="avatar" class="imaged w64 rounded">
            </div>
            <div class="in">
                <h3 class="name"><?= $row->nama ?></h3>
                <h5 class="subtext"><ion-icon name="person" role="img" class="md hydrated" aria-label="person"></ion-icon><?= $this->fungsi->status($this->session->tipe_user) ?></h5>
            </div>
        </div>
    </div>

    <div class="section mt-2">
        <div class="section full">
            <div class="wide-block transparent p-0">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="label">Username <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->username ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Nama <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->nama ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Email <span id="alert-resume" class="error">*</span></label>
                        <input type="email" class="form-control" value="<?= $row->email ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">NIK <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->nik ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tempat, Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->tempat_lahir ?>, <?= date("d M Y", strtotime($row->tgl_lahir)) ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->kelamin ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Hp <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->hp ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Agama <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->agama ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Domisili <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->domisili ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Pernikahan <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= strtoupper($row->pernikahan) ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Pendidikan <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->pendidikan_terakhir ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tahun Bergabung <span id="alert-resume" class="error">*</span></label>
                        <input class="form-control" value="<?= $row->tahun_bergabung ?>" readonly>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">List Device Terdaftar </label>
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
                                foreach ($device->result() as $key => $data) {;
                                ?>
                                    <tr>
                                        <td scope="row">
                                            <p><?= $data->platform ?></p>
                                        </td>
                                        <td><?= sha1($data->token) ?></td>
                                        <td><?= $data->browser ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Riwayat Login </label>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">IP Addess</th>
                                    <th scope="col">Via</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($login->result() as $key => $data) {;
                                ?>
                                    <tr>
                                        <td scope="row">
                                            <p><?= $data->created ?></p>
                                        </td>
                                        <td>
                                            <p><?= $data->ip_address ?></p>
                                        </td>
                                        <td><?= $data->platform ?> | <?= $data->browser ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div>
                        <a href="<?= base_url("profil/edit/" . $this->session->id) ?>" class="btn btn-block btn-success"><ion-icon name="create-outline"></ion-icon> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * App Capsule -->