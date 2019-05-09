<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4"><?= $title ?></h1>
	<p class="lead">Daftar Kiriman yang dikirim oleh pengguna Blogspot. Kiriman yang paling terbaru akan ditampilkan teratas. Cari kiriman sesuai dengan keinginanmu!</p>
	<form action="" method="GET">
		<div class="form-group mb-4">
			<input id="keyword" type="text" name="keyword" class="form-control" placeholder="Cari Sesuatu .." autocomplete="off" autofocus require>
			<small id="nameAlert" class="mt-1" style="color: red;"></small>
		</div>
	</form>
</div>

<div class="container">
	<div class="row">

		<?php if( count($posts) < 1 ): ?>
		<div class="col-12">
			<div class="alert alert-warning" role="alert">
				Tidak Ada Kiriman!
			</div>
		</div>
		<?php endif; ?>

		<?php if( validation_errors() != "" ) : ?>
      <div class="col-12">
			<div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
         </div>
      </div>
      <?php endif; ?>

		<?php if( $this->session->flashdata('error_msg') ) : ?>
      <div class="col-12">
			<div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error_msg'); ?>
         </div>
      </div>
      <?php endif; ?>

		<?php foreach($posts as $post): ?>
		<div class="col-4">
			<div class="card box-post">
				<div class="card-body text-center">
					<h5 class="card-title">
						<?= $post["title"] ?>
					</h5>
					<h6 class="card-subtitle mb-2 text-muted">
						<?= date( 'd M Y - H:i', strtotime( $post['datetime'] ) ) ?>
					</h6>
					<p class="card-text">
						<?= substr( strip_tags($post['subject']), 0, 150) . '...' ?>
					</p>

					<a class="card-link" href="<?= base_url( 'post/' . $post['slug'] ) ?>">Lihat</a>

					<?php if( isset( $this->session->id ) && $this->session->id == $post['user_id'] ) : ?>
						<a class="card-link" href="<?= base_url( 'post/' . $post['slug'] . '/edit' ) ?>">Ubah</a>
						<a class="btn btn-link" href="<?= base_url( 'post/delete/' . $post['slug'] ) ?>" style="color: red;" onclick="return confirm('Apakah kamu yakin mau menghapusnya ?')">Hapus</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

	<div class="row">
		<div class="col-4 offset-4 mt-4">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>