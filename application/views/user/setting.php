<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4"><?= $title ?></h1>
	<p class="lead">Login terlebih dahulu untuk dapat berkomentar atau membuat kiriman di Blogspot.</p>
</div>

<div class="container">
	<div class="row">

      <div class="col-6 offset-3 mb-4">

         <?php if( $this->session->flashdata('success_msg') ) : ?>
            <div class="alert alert-success" role="alert">
               <?= $this->session->flashdata('success_msg') ?>
            </div>
         <?php endif; ?>

         <form action="<?= base_url('user/photo/edit') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
               <div class="col-4 offset-4 mb-3 text-center">
                  <img class="img-fluid img-circle img-thumbnail image-photo-profile" src="<?= base_url('assets/img/user/' . $user['image']) ?>" alt="">

                  <?php if( $user['image'] !== 'icon_user.png' ) : ?>
                     <a class="btn btn-link btn-sm" href="<?= base_url('user/photo/delete') ?>" onclick="return confirm('Apakah yakin ingin menghapus foto profil kamu ?')">Hapus Foto</a>
                  <?php endif; ?>
               </div>
            </div>
            <div class="custom-file">
               <input type="file" name="userfile" class="custom-file-input photo-profile" id="customFile">
               <label class="custom-file-label photo-profile-label" for="customFile">Pilih Gambar</label>
            </div>
            <div class="form-group mt-2">
               <button class="btn btn-primary btn-sm btn-block" type="submit">Ubah Foto Profil</button>
            </div>
         </form>
      </div>
      
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-body">

               <h4 class="text-center mb-3">Ubah Kata Sandi</h4>

               <?php if( $this->session->flashdata('error_msg') ) : ?>
                  <div id="passAlert" class="alert alert-danger" role="alert">
                     <?= $this->session->flashdata('error_msg') ?>
                  </div>
               <?php endif; ?>

               <?php if( $this->session->flashdata('success_msg_pass') ) : ?>
                  <div id="passAlert" class="alert alert-success" role="alert">
                     <?= $this->session->flashdata('success_msg_pass') ?>
                  </div>
               <?php endif; ?>

               <?= form_open('user/password/change'); ?>
                  <div class="form-group">
                     <label for="oldPassword">Kata Sandi Lama</label>
                     <input id="oldPassword" type="password" name="oldPassword" class="form-control" placeholder="Kata Sandi Lama" autocomplete="off">
                  </div>
                  <div class="form-group">
                     <label for="newPassword">Kata Sandi Baru</label>
                     <input id="newPassword" type="password" name="password" class="form-control" placeholder="Kata Sandi Baru">
                  </div>
                  <div class="form-group">
                     <label for="passconf">Konfirmasi Kata Sandi</label>
                     <input id="passconf" type="password" name="passconf" class="form-control" placeholder="Konfirmasi Kata Sandi" value="<?= set_value('passconf'); ?>">
                     <small id="passconfAlert" class="mt-1" style="color: red;"></small>
                  </div>
                  <div class="form-group mt-4">
                     <button class="btn btn-primary btn-block" type="submit">Ubah Kata Sandi</button>
                  </div>
               </form>

				</div>
			</div>
		</div>
	</div>
</div>