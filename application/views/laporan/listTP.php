<!-- App Capsule -->
<div id="appCapsule">
	<div class="section full mt-2">
		<div class="row">
			<div class="col-12">
				<div class="col-12">
					<h3>CETAK DATA LAPORAN</h3>
					<div class="card">
						<div class="card-body">
							<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<input type="hidden" name="id" value="<?= $this->session->id ?>">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<select name="tahun" class="btn btn-outline-primary " required>
										<option value="">Pilih Tahun</option>
										<?php $thn_skr = date('Y');
										for ($x = $thn_skr; $x >= 2022; $x--) { ?>
											<option value="<?php echo $x ?>"><?php echo $x ?></option>
										<?php } ?>
									</select>
									<button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
								</div>
								<div class="input-group-append">
								</div>
							</form>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<div style="overflow-x:auto;">
									<table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
										<thead>
											<tr>
												<th width="5%">No</th>
												<th width="55%">Deskripsi</th>
												<th width="40%">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($row->result() as $key => $data) {;
											?>
												<tr>
													<td scope="row">
														<p><?= $no++ ?></p>
													</td>
													<td><?= date("d-m-Y", strtotime($data->tgl_lahir)) ?> <br> <?= $data->domisili ?></td>
													<td>
														<?= $data->nama ?> <br> <small><?= $data->email ?></small><br>
														<a href="https://wa.me/+62<?= $data->hp ?>"><?= $data->hp ?></a>
													</td>
													<td>
														<a href="<?= site_url('podcast/hapus/' . $data->id); ?>" onclick="alert('Yakin mau dihapus ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
</div>
<!-- * App Capsule -->