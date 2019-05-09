<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4"><?= $post['title'] ?></h1>
	<p class="lead"><?= date("d M Y - H:i", strtotime( $post['datetime'] )) ?></p>
</div>

	<?php if( $this->session->flashdata('error_msg') ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('error_msg'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

<div class="container">
	<div class="row">

		<div class="col-12">
			<div class="card detail-post">
				<div class="card-body">
					<p class="card-text">
						<?= $post['subject'] ?>
					</p>
				</div>
			</div>
      </div>

		<div class="col-12">
			<div class="comment">
				<div class="row">

					<div class="col-12">
						<h5 class="mb-4">Komentar</h5>
					</div>

					<?php foreach( $comments as $comment ) : ?>
					<div class="col-12">
						<div class="row">
							<div class="col-1">
								<img class="img-fluid col-12" src="<?= base_url('assets/img/user/' . $comment['image']) ?>" alt="Image" style="border-radius: 50%">
							</div>
							<div class="col-11">
								<div class="comment-header">
									<p><a href="<?= base_url('user/' . $comment['username']) ?>"><?= $comment['name'] ?></a> ( <small><?= $comment['username'] ?></small> )</p>
									<small><?= date("d M Y - H:i", strtotime( $comment['datetime'] )) ?></small>
								</div>
								<div class="comment-body">
									<p class="comment-subject"><?= $comment['subject'] ?></p>

									<?php if( $this->session->id == $comment['user_id'] ) : ?>
										<form action="<?= base_url('post/comment/' . $comment['id'] . '/delete') ?>" method="POST">
											<button class="btn btn-link btn-sm btn-edit" type="button" value="<?= $comment['id'] ?>">Ubah</button>
											<button class="btn btn-link btn-sm btn-red" type="submit" onclick="return confirm('Kamu yakin ingin menghapusnya ?')">Hapus</button>
										</form>
									<?php elseif( $this->session->id == $post['user_id'] ): ?>
										<form action="<?= base_url('post/comment/' . $comment['id'] . '/delete') ?>" method="POST">
											<button class="btn btn-link btn-sm btn-red" type="submit" onclick="return confirm('Kamu yakin ingin menghapusnya ?')">Hapus</button>
										</form>
									<?php else: ?>
										<br>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

				</div>
				<form id="comment" class="form" action="<?= base_url('post/comment/' . $post['id'] . '/create') ?>" method="POST">
					<div class="row">
						<div class="col-11 textarea">
							<textarea class="form-control" type="text" name="comment" placeholder="Tulis komentar disini.." rows="1"></textarea>
						</div>
						<div class="col-1 action text-right">
							<button class="btn btn-primary btn-block" type="submit">Send</button>
						</div>
					</div>
				</form>
			</div>
      </div>

	</div>
</div>