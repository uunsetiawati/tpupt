<!-- App Capsule -->
<div id="appCapsule">


<div class="section full mt-2">
    
    
    <div class="row">
		<div class="col-12">
			<div class="col-12">	
            <h3>DATA LAPORAN</h3>
            <div class="card">
					<div class="card-body">
				
				<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?= $this->session->id ?>">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						</div>
                        
						<select name="bulan" class="btn btn-outline-primary " required>
							<option value="">Pilih Bulan</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
                        </select>
                        

						<select name="tahun" class="btn btn-outline-primary " required>
							<option value="">Pilih Tahun</option>
							<?php $thn_skr = date('Y');
							for ($x = $thn_skr; $x >= 2018; $x--) { ?>
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
										<th width="40%">Bulan</th>
                                        <th width="40%">Tahun</th>
                                        <th width="30%">#</th>

									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td scope="row">
                                            <p>1</p>
                                        </td>
                                        <td scope="row">
                                            <p>JANUARI</p>                                        
                                        </td>
                                        <td scope="row">
                                            <p>2023</p>
                                        </td>                                        
                                        <td>
                                            <a href="" class="btn btn-danger"><i class="fa fa-download"></i></a>
                                            <a href="" class="btn btn-warning"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>									
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