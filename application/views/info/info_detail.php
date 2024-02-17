<!-- App Header -->
<div class="appHeader bg-primary text-light">
	<div class="left">
		<a href="<?=base_url("info")?>" class="headerButton goBack">
			<ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
		</a>
	</div>
	<div class="pageTitle"><?= $menu ?></div>
	<?php if ($this->session->tipe_user >= 2) { ?>
		<div class="right">
			<a href="<?= site_url('info/edit/' . $data->id); ?>" class="headerButton">
				<ion-icon name="create-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
			<a href="<?= site_url('info/hapus/' . $data->id); ?>" class="headerButton" onclick="return confirm('Apakah yakin mau dihapus?')">
				<ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
			</a>
		</div>
	<?php } ?>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

<div class="blog-post">
	<div class="mb-2">
		<img src="<?= base_url() ?>assets/dist/img/foto-info/<?= ($data->foto != null) ? $data->foto : "foto-default.jpg"; ?>" alt="image" class="imaged square w-100">
	</div>
	<h1 class="title"><?= $data->judul ?></h1>

	<div class="post-header">
		<div>
			<a href="#">
				<?= $this->fungsi->pilihan_selected("tb_user", $data->user_id)->row("nama") ?>
			</a>
		</div>
		<?= $data->created ?>
	</div>
	<div class="post-body">
		<p>
			<?= $data->deskripsi ?>
		</p>
	</div>
</div>

<div class="divider mt-2 mb-3"></div>

<!-- * App Capsule -->
