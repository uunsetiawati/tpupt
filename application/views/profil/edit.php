<!-- App Capsule -->
<div id="appCapsule">
    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Edit Profil <br> <?= $this->session->nama ?></h1>
            <p>Silahkan lengkapi profil anda terlebih dahulu</p>
        </div>
        <hr>
        <div class="section mt-2 mb-5">
            <?= form_open_multipart('') ?>
            <input type="hidden" name="tipe" id="tampiltipe">

            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Nama<span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" value="<?= $row->nama ?>" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">NIK <span id="alert-resume" class="error">(boleh dilengkapi selanjutnya)</span></label>
                    <input type="text" id="word" name="nik" class="form-control" placeholder="BIK" value="<?= $row->nik ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" required>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option2" value="Laki-Laki" <?= $row->kelamin == "Laki-Laki" ? "checked" : "" ?>> Laki-Laki
                        </label>
                        <label class="btn btn-outline-primary">
                            <input type="radio" name="kelamin" id="option3" value="Perempuan" <?= $row->kelamin == "Perempuan" ? "checked" : "" ?>> Perempuan
                        </label>
                    </div>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Agama <span id="alert-resume" class="error">*</span></label>
                    <select name="agama" class="form-control">
                        <option value="<?= $row->agama ?>">Agama : <?= $row->agama ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Kong Hu Cu">Kong Hu Cu</option>
                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tempat Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Ex: Kota Malang" value="<?= $row->tempat_lahir ?>" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir ?>" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Domisili <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="domisili" class="form-control" placeholder="Ex: Jl. Surabaya No. 5, Sumbersari, Kota Malang" value="<?= $row->domisili ?>" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Pendidikan Terakhir <span id="alert-resume" class="error">*</span></label>
                    <select name="pendidikan_terakhir" class="form-control">
                        <option value="<?= $row->pendidikan_terakhir ?>">Pendidikan Terakhir: <?= $row->pendidikan_terakhir ?></option>
                        <option value="SD/MI/Sederajat">SD/MI</option>
                        <option value="SMP/MTS/Sederajat">SMP/MTS</option>
                        <option value="SMA/MA/Sederajat">SMA/SMK/MA</option>
                        <option value="D-1">D-1</option>
                        <option value="D-3">D-3</option>
                        <option value="S-1 Sederajat">S-1 Sederajat</option>
                        <option value="S-2">S-2</option>
                        <option value="S-3">S-3</option>
                    </select>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Pernikahan<span id="alert-resume" class="error">*</span></label>
                    <select name="pernikahan" class="form-control">
                        <option value="<?= $row->pernikahan ?>">Status Pernikahan: <?= $row->pernikahan ?></option>
                        <option value="menikah">MENIKAH</option>
                        <option value="belum menikah">BELUM MENIKAH</option>
                        <option value="cerai hidup">CERAI HIDUP</option>
                        <option value="cerai mati">CERAI MATI</option>
                    </select>
                </div>
                <hr>
                <!-- <div class="input-wrapper">
                    <label class="label">No. Telepon (WhatsApp) <span id="alert-resume" class="error">*Kosongi jika tidak ingin merubah</span></label>
                    <input type="text" name="hp" class="form-control" placeholder="Ex: 081231390340" minlength="10">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                    <?php echo form_error('hp')?> 
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Email <span id="alert-resume" class="error">*Kosongi jika tidak ingin merubah</span></label>
                    <input type="text" name="email" class="form-control" placeholder="Ex: bikinkarya.official@gmail.com">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                    <?php echo form_error('email')?> 
                </div>
                <hr> -->
                <div class="input-wrapper">
                    <label class="label">Tahun Bergabung <span id="alert-resume" class="error">*</span></label>
                    <input type="text" name="tahun_bergabung" class="form-control" placeholder="Ex: 2023" required minlength="4" maxlength="4" value="<?= $row->tahun_bergabung ?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <hr>
            <div class="form-button">
                <button type="submit" class="btn btn-success btn-block">EDIT</button>
                <button type="reset" class="btn btn-outline-danger btn-block">ULANGI</button>
                <button type="button" class="btn btn-primary btn-block" onclick="history.back()">KEMBALI</button>
            </div>
            <?= form_close() ?>
        </div>

        <a href="#" class="button goTop">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>

    </div>
    <!-- * App Capsule -->