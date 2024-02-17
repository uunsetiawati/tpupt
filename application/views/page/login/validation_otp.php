<div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
        <div class="section">
            <img src="<?= base_url() ?>/assets/img/icon/logo-kitapku.png" alt="image" class="form-image">
        </div>
        <div class="section mt-1">
            <hr>
            <h2>Masukkan Kode yang Dikirim Melalui WA (Hanya berlaku 1x)</h2>
            <!-- <h4>LOGIN</h4> -->
        </div>
        <div class="section mt-1 mb-5">
            <?php $this->view('message'); ?>
            <form action="<?= site_url('auth/validationOTP') ?>" method="post" id="FormLogin">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="tel" class="form-control" name="otp" placeholder="Masukkan kode OTP" minlength="6" maxlength="6" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-success btn-block"><ion-icon name="key-outline"></ion-icon>VALIDASI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>