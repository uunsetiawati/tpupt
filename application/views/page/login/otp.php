<div id="appCapsule" class="pt-0">
    <div class="login-form mt-1">
        <div class="section">
            <img src="<?= base_url() ?>/assets/img/icon/logo-kitapku.png" alt="image" class="form-image">
        </div>
        <div class="section mt-1">
            <hr>
            <h2>Login Menggunakan Nomor HP</h2>
            <!-- <h4>LOGIN</h4> -->
        </div>
        <div class="section mt-1 mb-5">
            <?php $this->view('message'); ?>
            <form action="<?= base_url('auth/checkOtp') ?>" method="post">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="tel" class="form-control" name="hp" placeholder="Ex: 081231390340"  minlength="11" maxlength="15" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-success btn-block"><ion-icon name="logo-whatsapp"></ion-icon> Kirim Kode Verifikasi</button>
                        <hr>
                        <a href="<?= base_url("auth/login") ?>" class="btn btn-primary btn-block"><ion-icon name="people-outline"></ion-icon> Login dengan Akun</a>
                        <a href="<?= base_url("auth/google") ?>" class="btn btn-danger btn-block"><ion-icon name="logo-google"></ion-icon> Login With Google</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>