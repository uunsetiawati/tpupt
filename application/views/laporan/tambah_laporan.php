<!-- App Capsule -->
<div id="appCapsule">

		<div class="section mt-2">
            <div class="card text-center">            
                <a href="https://logwork.com/countdown-xhpy" class="countdown-timer" data-style="circles" data-timezone="Asia/Jakarta" data-date="2023-01-02 00:00">Sisa Waktu Upload</a>
			</div>
        </div>

		<div class="section mt-2">
            <div class="card text-center">                
                <div class="card-body">
                    <h5 class="card-title">Template Dokumen Laporan Tenaga Pendamping</h5>
                    <p class="card-text text-left">Pentunjuk Pengisian Laporan Kinerja dalam Sebulan.</p>
                    <ol class="text-left">
                        <li>Download Template Dokumen Laporan selama sebulan.</li>
                        <li>Isikan sesuai kegiatan / kunjungan yang telah dilakukan.</li>
                        <li>Simpan dokumen dalam bentuk PDF.</li>
                        <li>Upload pada menu yang telah disediakan.</li>
                    </ol>
                    </p>
                    <a href="<?=base_url('/assets/files/template/1. Format Laporan Bulanan.rtf')?>" class="btn btn-danger"><ion-icon name="cloud-download-outline"></ion-icon> Download Template Laporan Bulanan</a>
				    <a href="<?=base_url('/assets/files/template/LAPORAN TRANSLOK.docx')?>" class="btn btn-primary"><ion-icon name="cloud-download-outline"></ion-icon> Download Template Laporan Translok</a>
                    <a href="<?=base_url('/assets/files/template/SURAT KETERANGAN KUNJUNGAN_Lampiran Translok.rtf')?>" class="btn btn-warning"><ion-icon name="cloud-download-outline"></ion-icon> Download Template Surat Keterangan Kunjungan</a>
                </div>
            </div>
        </div>

		<div class="section full mt-2 mb-2">
				<div class="wide-block pb-2 pt-2">
					<form action="<?=site_url('tampilan/targetdata')?>" method="post">
						<div class="custom-file-upload">
							<input type="file" name="translok" id="targetkerja" accept=".pdf">
							<label for="targetkerja">
								<span>
									<strong>
										<ion-icon name="cloud-upload-outline"></ion-icon>
										<i>Klik Untuk Upload Dokumen Laporan Translok</i>
									</strong>
								</span>
							</label>
						</div>
                        </hr>
                        <div class="custom-file-upload">
							<input type="file" name="kunjungan" id="targetkerja" accept=".pdf">
							<label for="targetkerja">
								<span>
									<strong>
										<ion-icon name="cloud-upload-outline"></ion-icon>
										<i>Klik Untuk Upload Dokumen Surat Keterangan Kunjungan</i>
									</strong>
								</span>
							</label>
						</div>
                        </hr>
                        <div class="custom-file-upload">
							<input type="file" name="sppd" id="targetkerja" accept=".pdf">
							<label for="targetkerja">
								<span>
									<strong>
										<ion-icon name="cloud-upload-outline"></ion-icon>
										<i>Klik Untuk Upload SPPD</i>
									</strong>
								</span>
							</label>
						</div>
                        </hr>
                        <div class="custom-file-upload">
							<input type="file" name="spt" id="targetkerja" accept=".pdf">
							<label for="targetkerja">
								<span>
									<strong>
										<ion-icon name="cloud-upload-outline"></ion-icon>
										<i>Klik Untuk Upload SPT</i>
									</strong>
								</span>
							</label>
						</div>
                        <div class="form-button">
                            <button type="submit" class="btn btn-block btn-info"><ion-icon name="cloud-upload-outline"></ion-icon> UPLOAD</button>
                        </div>
					</form>
				</div>
        	</div>
		</div>       
		
</div>
<!-- * App Capsule -->