<!-- App Capsule -->
<div id="appCapsule">
    <div class="section mt-2">
        <div class="section">
            <h1 class="mb-0">Edit Password</h1>
        </div>
        <hr>
        <div class="section mt-2 mb-5">
            <?= form_open_multipart(); ?>
            <div class="form-group boxed">
                <div class="input-wrapper not-empty">
                    <input type="password" name="password" class="form-control" minlength="8" minlength="20" required>
                    <i class="clear-input">
                        <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                    </i>
                </div>
            </div>
            <hr>
            <div class="form-button">
                <button type="submit" class="btn btn-success btn-block">
                    <ion-icon name="save-outline"></ion-icon> UPDATE DATA
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