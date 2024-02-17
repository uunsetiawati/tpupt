<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?= base_url()?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"><?= $title ?></div>
	<?php if ($this->session->tipe_user >= 2) { ?>
		<div class="right">
			<a href="<?= base_url("info/tambah") ?>" class="headerButton">
				<ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
		</div>
	<?php } ?>
</div>
<!-- * App Header -->

<br> <br>

<!-- Content -->
<div class="section mt-2">
	<?php $this->view('message') ?>
</div>
<?php foreach ($row->result() as $key => $data) {; ?>
<div class="section mt-2">
	<div class="card">
		<img src="<?= base_url() ?>assets/files/foto_info/<?= ($data->foto != null) ? $data->foto : "foto-default.jpg"; ?>" class="card-img-top" alt="image">
		<div class="card-body">
			<h5 class="card-title"><?= $data->judul ?></h5>
			<p class="card-text"><small><i class="fas fa-user"></i> <?= $this->fungsi->pilihan_selected("tb_user", $data->user_id)->row("nama") ?> </small></p>
			<hr>
			<center>
				<a href="<?= site_url('info/detail/' . $data->id); ?>" class="btn btn-outline-success btn-sm">
					<ion-icon name="eye-outline"></ion-icon><b> Lihat</b>
				</a>
				<?php if ($this->fungsi->user_login()->tipe_user < 2) {
				} else {; ?>
					<a href="<?= site_url('info/edit/' . $data->id); ?>" class="btn btn-outline-warning btn-sm">
						<ion-icon name="create-outline"></ion-icon><b> Edit</b>
					</a>
					<a href="<?= site_url('info/hapus/' . $data->id); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah yakin mau dihapus?')">
						<ion-icon name="trash-outline"></ion-icon><b> Hapus</b>
					</a>
				<?php } ?>
			</center>
		</div>
	</div>
</div>
<?php } ?>
<!-- * COntent -->
<div class="section mt-2">
	<div class="col-12">
		<?= $this->pagination->create_links(); ?>
	</div>
<div>