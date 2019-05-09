<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Buat Kiriman</h1>
	<p class="lead">Buat Kiriman hanya dapat dilakukan oleh pengguna Blogspot. Kiriman yang paling terbaru akan ditampilkan teratas. Ayo buat banyak kiriman versi kamu!</p>
</div>

<div class="container">
	<div class="row">

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
      
		<div class="col-12">
			<div class="card">
				<div class="card-body">

               <form action="<?= base_url('post/create') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="input">Judul Kiriman</label>
                     <input type="text" name="title" class="form-control" id="input" placeholder="Judul Kiriman" autocomplete="off" autofocus>
                  </div>
                  <div class="form-group">
                     <label for="textarea">Isi Kiriman</label>
                     <textarea type="text" name="subject" class="form-control" id="textarea" placeholder="Tuliskan kiriman yang kamu pikirkan .." rows="5"></textarea>
                  </div>
                  <div class="custom-file">
                     <input type="file" name="userfile" class="custom-file-input" id="customFile">
                     <label class="custom-file-label" for="customFile">Pilih Gambar Sampul</label>
                  </div>
                  <div class="form-group mt-4">
                     <button class="btn btn-primary btn-block" type="submit">Buat</button>
                  </div>
               </form>

				</div>
			</div>
		</div>
	</div>
</div>