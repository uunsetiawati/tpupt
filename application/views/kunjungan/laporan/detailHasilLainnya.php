<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Kunjungan Tenaga Pendamping : <?= $row->created ?></h1>
        </div>
        <hr>
        <div class="section mt-2 mb-5">

            <input type="hidden" name="tipe" value="<?= $row->tipe ?>">
            <input type="hidden" name="id" value=<?= $row->id ?>>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Permasalan yang dihadapi <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="masalah" class="form-control" placeholder="Permasalahan yang dihadapi" readonly minlength="10" value="<?= $row->masalah?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Target <span id="alert-resume" class="error">*</span></label>
                    <input type="tel" id="word" name="target" class="form-control" placeholder="Target yang ingin dicapai" readonly minlength="10" value="<?= $row->target?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Realisasi/Output <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="realisasi" class="form-control" placeholder="Realisasi yang dilakuakan" readonly readonly minlength="10" value="<?= $row->realisasi?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kegiatan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kegiatan" class="form-control" placeholder="Kegiatan yang dilakukan" readonly readonly minlength="10" value="<?= $row->kegiatan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tujuan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tujuan" class="form-control" placeholder="Tujuan Kegiatan" readonly readonly minlength="10" value="<?= $row->tujuan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Kesimpulan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="kesimpulan" class="form-control" placeholder="Kesimpulan dari Kegiatan" readonly readonly minlength="10" value="<?= $row->kesimpulan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Tindak Lanjut <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="tindak_lanjut" class="form-control" placeholder="Tindak lanjut dari Kegiatan" readonly readonly minlength="10" value="<?= $row->tindak_lanjut?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <div class="input-wrapper">
                    <label class="label">Keterangan <span id="alert-resume" class="error">*</span></label>
                    <input type="text" id="word" name="keterangan" class="form-control" placeholder="Keterangan bisa diisikan tempat Kegiatan" readonly readonly minlength="10" value="<?= $row->keterangan?>">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
                <hr>
                <?php if ($row->foto_selfie == null) { ?>
                    <label class="label">Foto Selfie <span id="alert-resume" class="error">*</span></label>
                    <div class="custom-file-upload">
                        <input type="file" id="foto_selfie" name="foto_selfie" accept=".png, .jpg, .jpeg" readonly>
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
                        <input type="file" id="foto_lokasi" name="foto_lokasi" accept=".png, .jpg, .jpeg" readonly>
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
            <div class="form-button">
                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="history.back()">KEMBALI</button>
            </div>
        </div>

        <a href="#" class="button goTop">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>

    </div>
    <!-- * App Capsule -->