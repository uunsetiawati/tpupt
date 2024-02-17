<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Edit Kunjungan</h1>
        </div>
        <hr>
        <div class="section mt-2 mb-5">

            <?= form_open_multipart(); ?>
            <input type="hidden" name="tipe" value="<?= $row->tipe ?>">
            <input type="hidden" name="id" value=<?= $row->id ?>>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Permasalan yang dihadapi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="masalah" class="form-control" placeholder="Permasalahan yang dihadapi" required minlength="10" value="<?= $row->masalah?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Target <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="target" class="form-control" placeholder="Target yang ingin dicapai" required minlength="10" value="<?= $row->target?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Realisasi/Output <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="realisasi" class="form-control" placeholder="Realisasi yang dilakuakan" required required minlength="10" value="<?= $row->realisasi?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kegiatan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kegiatan" class="form-control" placeholder="Kegiatan yang dilakukan" required required minlength="10" value="<?= $row->kegiatan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kegiatan" required required minlength="10" value="<?= $row->tujuan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kesimpulan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kesimpulan" class="form-control" placeholder="Kesimpulan dari Kegiatan" required required minlength="10" value="<?= $row->kesimpulan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tindak Lanjut <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tindak_lanjut" class="form-control" placeholder="Tindak lanjut dari Kegiatan" required required minlength="10" value="<?= $row->tindak_lanjut?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Keterangan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="keterangan" class="form-control" placeholder="Keterangan bisa diisikan tempat Kegiatan" required required minlength="10" value="<?= $row->keterangan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <?php if ($row->foto_selfie == null) { ?>
                    <label class="label">Foto Selfie <span id="alert-resume" class="error">*</span></label>
                    <div class="custom-file-upload">
                        <input type="file" id="foto_selfie" name="foto_selfie" accept=".png, .jpg, .jpeg" required>
                        <label for="foto_selfie">
                            <span>
                                <strong>
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                    <i>Klik Untuk Upload Foto Selfie</i><br>
                                    <i>Foto Hanya bisa di Upload 1x</i>
                                </strong>
                            </span>
                        </label>
                    </div>
                <?php } else { ?>
                    <img src="<?= base_url() ?>/assets/files/foto_selfie/<?= $row->foto_selfie ?>" alt="" class="imaged w200">
                    <input type="text" value="Foto Selfie" class="form-control" readonly>
                <?php } ?>
                <hr>
                <?php if ($row->foto_lokasi == null) { ?>
                    <label class="label">Foto Lokasi <span id="alert-resume" class="error">*</span></label>
                    <div class="custom-file-upload">
                        <input type="file" id="foto_lokasi" name="foto_lokasi" accept=".png, .jpg, .jpeg" required>
                        <label for="foto_lokasi">
                            <span>
                                <strong>
                                    <ion-icon name="cloud-upload-outline"></ion-icon>
                                    <i>Klik Untuk Upload Foto Selfie</i><br>
                                    <i>Foto Hanya bisa di Upload 1x</i>
                                </strong>
                            </span>
                        </label>
                    </div>
                <?php } else { ?>
                    <img src="<?= base_url() ?>/assets/files/foto_lokasi/<?= $row->foto_lokasi ?>" alt="" class="imaged w200">
                    <input type="text" value="Foto Lokasi" class="form-control" readonly>
                <?php } ?>
                <img src="<?= base_url() ?>/assets/files/maps/<?= $row->loc_img ?>" alt="" class="imaged w200">
            </div>
            <hr>

            <div class="form-button" id="btnsubmit">
                <button type="submit" class="btn btn-success btn-block btn-lg">UPDATE DATA</button>
            </div>
            <?= form_close(); ?>
        </div>

        <a href="#" class="button goTop">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>

    </div>
    <!-- * App Capsule -->