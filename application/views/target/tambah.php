<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-2">
		<div class="card text-center">
			<a href="https://logwork.com/countdown-xhpy" class="countdown-timer" data-style="circles" data-timezone="Asia/Jakarta" data-date="2023-01-02 00:00">Batas Waktu Upload</a>
		</div>
	</div>

	<div class="section mt-2">
		<div class="card text-center">
			<div class="card-body">
				<h5 class="card-title">Template Dokumen Rencana Kerja</h5>
				<p class="card-text text-left">Pentunjuk Pengisian Dokumen Rencana Kerja dalam Setahun.
				<ol class="text-left">
					<li>Download Template Dokumen Target Kinerja selama setahun.</li>
					<li>Isikan sesuai rencana kerja yang hendak dilakukan.</li>
					<li>Simpan dokumen dalam bentuk PDF.</li>
					<li>Upload pada menu yang telah disediakan.</li>
				</ol>
				</p>
				<a href="<?=base_url()?>/assets/files/template/Rencana Kerja Pendampingan 12 bulan.docx" class="btn btn-primary"><ion-icon name="cloud-download-outline"></ion-icon> Download Template Rencana Kerja</a>
			</div>
		</div>
	</div>
	<?php $this->view('message'); ?>
	<div class="section full mt-2 mb-2">
		<div class="wide-block pb-2 pt-2">
			<?= form_open_multipart('') ?>
			<div class="custom-file-upload">
				<input type="file" name="file" id="fileuploadInput" accept=".pdf" required>
				<label for="fileuploadInput">
					<span>
						<strong>
							<ion-icon name="cloud-upload-outline"></ion-icon>
							<i>Klik Untuk Memilih Dokumen Rencana Kerja</i>
						</strong>
					</span>
				</label>
			</div>
			<button type="submit" class="btn btn-block btn-info"><ion-icon name="cloud-upload-outline"></ion-icon> UPLOAD</button>
			<?= form_close() ?>
		</div>
	</div>
</div>

</div>
<!-- * App Capsule -->