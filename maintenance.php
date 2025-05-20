
<html lang="en">

<head>

	<meta charset="utf-8" />
	<title>Maintenance Page | stresscloud.pw</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="home-btn d-none d-sm-block">
		<a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
	</div>
	<section class="my-5 pt-sm-5">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="home-wrapper">
						<div class="mb-5">
							<img src="images/logo.png" alt="logo" height="100" />
						</div>

						<div class="row justify-content-center">
							<div class="col-sm-4">
								<div class="maintenance-img">
									<img src="assets/images/maintenance.png" alt="" class="img-fluid mx-auto d-block">
								</div>
							</div>
						</div>
						<h3 class="mt-5">Page is Under Maintenance</h3>
						<p>Please check back in sometime.</p>

						<div class="row">
							<div class="col-md-4">
								<div class="card mt-4 maintenance-box">
									<div class="card-body">
										<i class="bx bx-broadcast mb-4 h1 text-primary"></i>
										<h5 class="font-size-15 text-uppercase">Why is the Site Down?</h5>
										<p class="text-muted mb-0">There are different options, for example: updating or maintenance.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card mt-4 maintenance-box">
									<div class="card-body">
										<i class="bx bx-time-five mb-4 h1 text-primary"></i>
										<h5 class="font-size-15 text-uppercase">
										How long will it take.</h5>
										<p class="text-muted mb-0">It can take from 30 minutes to 4 hours.</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card mt-4 maintenance-box">
									<div class="card-body">
										<i class="bx bx-envelope mb-4 h1 text-primary"></i>
										<h5 class="font-size-15 text-uppercase">
										Do you need Support?</h5>
										<p class="text-muted mb-0">If you need help, you can contact the administration via chat or telegram.. <a
											href="https://t.me/slowaris"
											class="text-decoration-underline">Click</a></p>
										</div>
									</div>
								</div>
							</div>
							<!-- end row -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- JAVASCRIPT -->
		<script src="assets/libs/jquery/jquery.min.js"></script>
		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/libs/metismenu/metisMenu.min.js"></script>
		<script src="assets/libs/simplebar/simplebar.min.js"></script>
		<script src="assets/libs/node-waves/waves.min.js"></script>
		<script src="assets/js/app.js"></script>
			<?php
	require('xwaf.php');
	$xWAF = new xWAF();
	$xWAF->start();
	?>
	</body>
	</html>
