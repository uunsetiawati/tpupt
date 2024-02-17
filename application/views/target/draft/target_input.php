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
                    <h5 class="card-title">Template Dokumen target Kerja</h5>
                    <p class="card-text">Download Template Dokumen Target Kinerja selama setahun.</p>
                    <a href="#" class="btn btn-primary">Download Template</a>
                </div>
            </div>
        </div>

		<div class="section full mt-2 mb-2">
				<div class="wide-block pb-2 pt-2">
					<form action="<?=site_url('tampilan/targetdata')?>" method="post">
						<div class="custom-file-upload">
							<input type="file" id="targetkerja" accept=".pdf">
							<label for="targetkerja">
								<span>
									<strong>
										<ion-icon name="cloud-upload-outline"></ion-icon>
										<i>Klik Untuk Upload Dokumen Target Kerja</i>
									</strong>
								</span>
							</label>
						</div>
                        <div class="form-button">
                            <button type="submit" class="btn btn-success btn-block btn-lg">KIRIM</button>
                        </div>
					</form>
				</div>
        	</div>
		</div>
		
</div>
<!-- * App Capsule -->