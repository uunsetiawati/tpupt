<!-- App Capsule -->
<div id="appCapsule">
    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Silahkan Pilih Bidang Pendampingan Anda</h1>
        </div>
        <hr>
        <div class="section mt-2 mb-5">
            <?= form_open_multipart(); ?>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label">Bidang <span id="alert-resume" class="error">*</span></label>
                    <select name="bidang" class="form-control" required>
                        <option value="">Pilih Bidang : </option>
                        <option value="koperasi">Koperasi</option>
                        <option value="ukm">UKM</option>
                    </select>
                </div>

            </div>
            <hr>
            <div class="form-button">
                <button type="submit" class="btn btn-success btn-block">
                    <ion-icon name="save-outline"></ion-icon> PILIH BIDANG
                </button>
            </div>
            <?= form_close(); ?>
        </div>
        <a href="#" class="button goTop">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
    </div>
</div>
<!-- * App Capsule -->