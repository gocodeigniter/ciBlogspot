<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="baseUrl" content="<?= base_url() ?>">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>
	<link href="<?= base_url('assets/vendor/fontawesome/css/all.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<h5 class="my-0 mr-md-auto font-weight-normal">
			<a href="<?= base_url() ?>">Blogspot</a>
		</h5>

		<?php if( empty( $this->session->id ) ) : ?>
			<nav class="my-2 my-md-0 mr-md-3">
				<a class="p-2 text-dark" href="<?= base_url('login') ?>">Login</a>
			</nav>
			<a class="btn btn-success btn-sm" href="<?= base_url('register') ?>">Register</a>
		<?php else: ?>
			<div class="dropdown">
				<a class="btn btn-link btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!-- <i class="fa fa-user"></i> -->
					<img class="nav-brand" src="<?= base_url('assets/img/user/' . $this->session->image) ?>" alt="Image User">
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
					<h6 class="dropdown-header"><?= $this->session->name ?></h6>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url('user/' . $this->session->username) ?>">Lihat Kiriman</a>
					<a class="dropdown-item" href="<?= base_url('post/create') ?>">Buat Kiriman</a>
					<a class="dropdown-item" href="<?= base_url('user/setting') ?>">Pengaturan</a>
					<a class="dropdown-item" href="<?= base_url('logout') ?>">Keluar</a>
				</div>
			</div>
		<?php endif; ?>
	</div>