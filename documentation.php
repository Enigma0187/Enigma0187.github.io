<?php
include("header.php");
$paginaname = 'Hub';
?>
<body>
	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">

		<div class="page-content">
			<div class="container-fluid">

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-flex align-items-center justify-content-between">
							<p class="mb-0 font-size-18">Documentation</p>
						</div>
					</div>
				</div>     
				<!-- end page title -->


				<div class="checkout-tabs">
					<div class="row">
						<div class="col-lg-2">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-gen-ques-tab" data-toggle="pill" href="#v-pills-gen-ques" role="tab" aria-controls="v-pills-gen-ques" aria-selected="true">
									<i class= "bx bx-question-mark d-block check-nav-icon mt-4 mb-2"></i>
									<p class="mb-4">How to use?</p>
								</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="card">
								<div class="card-body">
									<div class="tab-content" id="v-pills-tabContent">
										<div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
											<h4 class="card-title mb-5">About method and settings</h4>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Layer 7 has two types of methods.</h5>
													<p class="text-muted">Bypass - Each request emulates a real user who can solve javascript challenges and captchas, they give a definite count request so that you will not see many requests for dstat since this method is intended for bypassing </p>
													<p class="text-muted">Bypass methods is: HTTP</p>
													<p class="text-muted">Brust- Сreates a huge number of requests  in an attempt to collapse the web server by bandwidth or cpu usage, best for unprotected websites.</p>
													<p class="text-muted">Burst methods is: PROXY</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Request Method:</h5>
													<p class="text-muted">This is the type of request in which each request will be executed for your target.</p>
													<p class="text-muted">More info on https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Ratelimit Mode:</h5>
													<p class="text-muted">Some websites try to defend against a ddos attack by limiting the number of times a user visits the website per second or minute. Rate limiting mode will visit the website at a lower frequency in an attempt to bypass this type of protection, enable this mode only if the website has rate limiting protection!</p>
												</div>
											</div>

											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Post Data:</h5>
													<p class="text-muted">Post Data: Post data is the data to be passed to the server in each request that uses the POST request method, for example when making a login request you pass a username and a password, you can use %RAND% to randomize parts of it.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Referrer:</h5>
													<p class="text-muted">HTTP referer indicates if the request its coming from another website, usually search engines or social media.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Country Origin:</h5>
													<p class="text-muted"> Country Origin allows you to choose where the attack will come from, the default uses all countries, and you can change it to an specific country. </p>
													<p class="text-muted">This is useful to bypass geo block protections.</p>
												</div>
											</div>
											<div class="faq-box media">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Cookies:</h5>
													<p class="text-muted"> You can set your own cookies to bypass cookie based protections or to act as a particular user, useful against many websites if used correctly.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end row -->
			</div> <!-- container-fluid -->
		</div>
		<!-- End Page-content -->

		<!-- Plugins js-->
		<script src="assets/libs/jquery-countdown/jquery.countdown.min.js"></script>
		<!-- Countdown js -->
		<script src="assets/js/pages/coming-soon.init.js"></script>

		<script src="assets/js/app.js"></script>

	</body>
	<?php
	require('xwaf.php');
	$xWAF = new xWAF();
	$xWAF->start();
	?>
	</html>
