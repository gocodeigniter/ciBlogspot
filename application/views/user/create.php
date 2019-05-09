<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Halaman Pendaftaran</h1>
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
      
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-body">

               <?= form_open('register'); ?>
                  <div class="form-group">
                     <label for="name">Nama Lengkap</label>
                     <input id="name" type="text" name="name" class="form-control" placeholder="Nama Lengkap" autocomplete="off" value="<?= set_value('name'); ?>" autofocus require>
                     <small id="nameAlert" class="mt-1" style="color: red;"></small>
                  </div>
                  <div class="form-group">
                     <label for="username">Nama Pengguna</label>
                     <input id="username" type="text" name="username" class="username form-control" placeholder="Nama Pengguna" autocomplete="off" value="<?= set_value('username'); ?>" autofocus require>
                     <small id="usernameAlert" class="mt-1" style="color: red;"></small>
                  </div>
                  <div class="form-group">
                     <label for="password">Kata Sandi</label>
                     <input id="password" type="password" name="password" class="form-control" placeholder="Kata Sandi" value="<?= set_value('password'); ?>" require>
                     <small id="passwordAlert" class="mt-1" style="color: red;"></small>
                  </div>
                  <div class="form-group">
                     <label for="passconf">Konfirmasi Kata Sandi</label>
                     <input id="passconf" type="password" name="passconf" class="form-control" placeholder="Konfirmasi Kata Sandi" value="<?= set_value('passconf'); ?>" require>
                     <small id="passconfAlert" class="mt-1" style="color: red;"></small>
                  </div>
                  <div class="form-group mt-4">
                     <button class="btn btn-primary btn-block" type="submit">Daftar</button>
                  </div>
               </form>

				</div>
			</div>
		</div>
	</div>
</div>