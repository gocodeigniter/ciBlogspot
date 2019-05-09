<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Blogspot</h1>
	<p class="lead">Login terlebih dahulu untuk dapat berkomentar atau membuat kiriman di Blogspot.</p>
</div>

<div class="container">
	<div class="row">
      
		<div class="col-6 offset-3">
			<div class="card">
				<div class="card-body">

               <?php if( $this->session->flashdata('error_msg') ) : ?>
                  <div class="alert alert-danger" role="alert">
                     <?= $this->session->flashdata('error_msg') ?>
                  </div>
               <?php endif; ?>

               <?= form_open('login/store'); ?>
                  <div class="form-group">
                     <label for="username">Nama Pengguna</label>
                     <input id="username" type="text" name="username" class="form-control" placeholder="Nama Pengguna" autocomplete="off" autofocus require>
                  </div>
                  <div class="form-group">
                     <label for="password">Kata Sandi</label>
                     <input id="password" type="password" name="password" class="form-control" placeholder="Kata Sandi" require>
                  </div>
                  <div class="form-group mt-4">
                     <button class="btn btn-primary btn-block" type="submit">Login</button>
                  </div>
               </form>

				</div>
			</div>
		</div>
	</div>
</div>