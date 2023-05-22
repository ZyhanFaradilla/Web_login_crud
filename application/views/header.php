<?php
//if(!$this->session->has_userdata('login'))
//redirect('user/login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?= base_url('favicon.ico') ?>" />
	<title>WEB CI</title>
	<link href="<?= base_url('assets/css/slate-bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/jquery.dataTables.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/general.css') ?>" rel="stylesheet" />

	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.datatable1').DataTable({
				pageLength: 10
			});
		});
	</script>
	<style>
		<style type="text/css">.fp_tree ul {
			margin-left: 0px
		}

		.fp_tree li {
			list-style-type: none;
			margin: 5px;
			position: relative
		}

		.fp_tree li::before {
			content: "";
			position: absolute;
			top: -5px;
			left: -20px;
			border-left: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			border-radius: 0 0 0 0;
			width: 20px;
			height: 14px
		}

		.fp_tree li::after {
			position: absolute;
			content: "";
			top: 8px;
			left: -20px;
			border-left: 1px solid #ccc;
			border-top: 1px solid #ccc;
			border-radius: 0 0 0 0;
			width: 20px;
			height: 100%
		}

		.fp_tree li:last-child::after {
			display: none
		}

		.fp_tree li:last-child:before {
			border-radius: 0 0 0 5px
		}

		ul.fp_tree>li:first-child::before {
			display: none
		}

		.fp_tree b {
			min-width: 50px;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url() ?>">WEB CI</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if ($this->session->userdata('login')) : ?>
						<li><a href="<?= site_url('data') ?>"><span class="glyphicon glyphicon-th-list"></span> Data</a></li>
						<li><a href="<?= site_url('user/password') ?>"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="<?= site_url('user/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					<?php else : ?>
						<li><a href="<?= site_url('home/tentang') ?>"><span class="glyphicon glyphicon-question-sign"></span> Tentang</a></li>
						<li><a href="<?= site_url('user/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php endif ?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container" style="min-height: 400px;">
		<div class="page-header">
			<h1><?= $title ?></h1>
		</div>