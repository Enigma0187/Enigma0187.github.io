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
							<h4 class="mb-0 font-size-18">FAQs</h4>

							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
									<li class="breadcrumb-item active">FAQs</li>
								</ol>
							</div>

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
									<p class="font-weight-bold mb-4">General Questions</p>
								</a>
								<a class="nav-link" id="v-pills-support-tab" data-toggle="pill" href="#v-pills-support" role="tab" aria-controls="v-pills-support" aria-selected="false">
									<i class= "bx bx-support d-block check-nav-icon mt-4 mb-2"></i>
									<p class="font-weight-bold mb-4">Support</p>
								</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="card">
								<div class="card-body">
									<div class="tab-content" id="v-pills-tabContent">
										<div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
											<h4 class="card-title mb-5">General Questions</h4>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">What it is?</h5>
													<p class="text-muted">It is a tool for testing your server/website against various types of attacks.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Free hub not down my target why?</h5>
													<p class="text-muted">Free hub uses 10% power and it is also limited in functionality.</p>
												</div>
											</div>

											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">My target is alive, why?</h5>
													<p class="text-muted">Each server has its own configuration and protection, so for this you must choose the method and the rest of the provided opportunities wisely.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">How many stress test per hour/day/month?</h5>
													<p class="text-muted">Unmetered!, our service does not limit the number of possible attacks per day or month.</p>
													<p class="text-muted"> The attack time and concurrent(s) depends on the plan you have.</p>
												</div>
											</div>
											<div class="faq-box media">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">It is legal?</h5>
													<p class="text-muted">There are no legal consequences, all logs are deleted every day automatic.
													</p>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="v-pills-support" role="tabpanel" aria-labelledby="v-pills-support-tab">
											<h4 class="card-title mb-5">Support</h4>

											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">I have a question how can I contact you?</h5>
													<p class="text-muted">You can contact the administrations via online chat or in the telegram channel</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">What payment systems do you accept?</h5>
													<p class="text-muted">We only accept cryptocurrency Bitcoin/Litecoin/Ethereum.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">Do you accept paypal?</h5>
													<p class="text-muted">Due to the fact that transactions can be tracked, we do not accept this type of payment.</p>
												</div>
											</div>
											<div class="faq-box media mb-4">
												<div class="faq-icon mr-3">
													<i class="bx bx-help-circle font-size-20 text-success"></i>
												</div>
												<div class="media-body">
													<h5 class="font-size-15">How i can buy BTC/ETH?</h5>
													<p class="text-muted">You can buy cryptocurrency using the following services: https://paxful.com / https://localbitcoins.com/
													.</p>
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
