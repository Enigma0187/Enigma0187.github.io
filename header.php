 <?php
 error_reporting(0);
 ini_set("display_errors", "Off");
 ini_set('memory_limit', '-1');

 function isXSS($string){
 	$xssparameters = array(
 		"<SCRIPT",
 		"<script",
 		"<script>",
 		"<iframe",
 		".css",
 		".js",
 		"<meta",
 		">",
 		"UPDATE",
 		"*",
 		",'",
 		"''",
 		"'",
 		"<frame",
 		"<img",
 		"<embed",
 		"<xml",
 		"ALERT(",
 		"<IFRAME",
 		"</",
 		"<?php",
 		"?>",
 		"SCRIPT>",
 		"JS>",
 		"<JS",
 		"JSON>",
 		".replace",
 		"unescape",
 		"<JSON",
 		"SCRIPT",
 		"DIV",
 		".CCS",
 		".JS",
 		"<META",
 		"<FRAME",
 		"<EMBED",
 		"<XML",
 		"<IFRAME",
 		"<IMG",
 		";--",
 		"nc",
 		"ncat",
 		"netcat",
 		"curl",
 		"telnet",
 		"sudo",
 		".sh",
 		"install",
 		"sudo",
 		"bash"
 	);
 	foreach ($xssparameters as $xssparameter) {
 		if (strpos($string, $xssparameter) !== false) {
 			return true;
 		}
 	}
 }

 if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {exit("NOT ALLOWED");}
 ob_start();
 require_once 'denial/config.php';
 require_once 'denial/init.php';
 if (!(empty($maintaince))) {
 	die($maintaince);
 }
 if (!($user -> LoggedIn()) || !($user -> notBanned($odb)))
 {
 	header('location: login.php');
 	die();
 }
 $SQL = $odb -> prepare("UPDATE `users` SET `membership`='168' WHERE `membership`='0'");
 $SQL -> execute(array(':id' => $id));
 $update = true;

 $SQL = $odb -> prepare("UPDATE `users` SET `expire`='1628796563' WHERE `expire`='0'");
 $SQL -> execute(array(':id' => $id));
 $update = true;
 ?>
<!DOCTYPE html>
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <!-- Toastr Alert-->
  <link rel="stylesheet" type="text/css" href="assets/libs/toastr/build/toastr.min.css">
  <!-- Sweet Alert-->
  <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
  <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
  <!-- ION Slider -->
  <link href="assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css"/>  
  <script src="https://shoppy.gg/api/embed.js"></script>
  <title>StressCloud.pw - Web/IP stresser/booter</title>
 </head>
 <body data-topbar="dark" data-layout="horizontal">
 	<!-- Begin page -->
 	<div id="layout-wrapper">
 		<header id="page-topbar">
 			<div class="navbar-header">
 				<div class="d-flex">
 					<!-- LOGO -->
 					<div class="navbar-brand-box">
 						<a href="index.php" class="logo logo-light">
 							<span class="logo-lg">
 								<img src="assets/images/logo-light.svg" alt="" height="45">
 							</span>
 						</a>
 					</div>
 					<button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
 						<i class="fa fa-fw fa-bars"></i>
 					</button>
 				</div>
 				<div class="d-flex">
 					<div class="dropdown d-none d-lg-inline-block ml-2">
 						<button type="button" class="btn header-item noti-icon waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 							<i class="bx bxl-telegram"></i>
 						</button>
 						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
 							<div class="px-lg-2">
 								<div class="row no-gutters">
 									<div class="col">
 										<a class="dropdown-icon-item" href="https://t.me/stresscloudteam">
 											<img src="assets/images/logo_share.png">
 											<span>Power Proof TG</span>
 										</a>
 									</div>
 									<div class="col">
 										<a class="dropdown-icon-item" href="https://t.me/stresscl">
 											<img src="assets/images/logo_share.png">
 											<span>Telegram Chat</span>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="dropdown d-inline-block  ">
 						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
 						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 						<img class="rounded-circle header-profile-user" src="assets/images/logo-light.svg"
 						alt="Header Avatar">
 						<span class="d-none d-xl-inline-block ml-1"><?php echo $_SESSION['username']; ?></span>
 						<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
 					</button>
 					<div class="dropdown-menu dropdown-menu-right">
 						<!-- item-->
 						<?php
 						if ($user -> isAdmin($odb)) {
 							echo '
 							<a class="dropdown-item d-block" href="admin/index.php"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Admin</a>
 							';}?>
 							<a class="dropdown-item d-block" href="settings.php"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
 							<div class="dropdown-divider"></div>
 							<a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</header>
 		<!--end-topbar-->
 		<!--start-topnav-->
 		<div class="topnav">		
 			<div class="container-fluid">
 				<nav class="navbar navbar-light navbar-expand-lg topnav-menu">
 					<div class="collapse navbar-collapse" id="topnav-menu-content">
 						<ul class="navbar-nav">

 							<li class="nav-item">
 								<a class="nav-link" href="index.php">
 									<i class="bx bx-home-circle mr-2"></i>Dashboard
 								</a>
 							</li>
 							<?php if ($user -> isPremium($odb))
 							{echo'<li class="nav-item">
 							<a class="nav-link" href="hub.php">
 							<i class="bx bx-wifi-off mr-2"></i>Attack Hub
 							</a>
 							</li>';}
 							else {echo'<li class="nav-item">
 							<a class="nav-link" href="free.php">
 							<i class="bx bx-wifi-off mr-2"></i>Attack Hub
 							</a>
 							</li>';}
 							?> 						
 							<li class="nav-item">
 								<a class="nav-link" href="plans.php">
 									<i class="bx bx-cart mr-2"></i>Purchase</a>
 								</a>
 							</li>

 							<li class="nav-item">
 								<a class="nav-link" href="redeem.php">
 									<i class="bx bx-gift mr-2"></i>Reedem</a>
 								</a>
 							</li>

 							<li class="nav-item">
 								<a class="nav-link" href="demo.php">
 									<i class="bx bx-tv mr-2"></i>Power Proof</a>
 								</a>
 							</li>

 							<li class="nav-item">
 								<a class="nav-link" href="faq.php">
 									<i class="bx bx-help-circle mr-2"></i>FAQ</a>
 								</a>
 							</li>

 							<li class="nav-item">
 								<a class="nav-link" href="documentation.php">
 									<i class="bx bx-slider-alt mr-2"></i>Documentation</a>
 								</a>
 							</li>
 						</ul>
 					</div>
 				</nav>
 			</div>
 		</div>
 		<!--end-topnav-->
 		<!-- JAVASCRIPT -->
 		<script src="assets/libs/jquery/jquery.min.js"></script>
 		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 		<script src="assets/libs/metismenu/metisMenu.min.js"></script>
 		<script src="assets/libs/simplebar/simplebar.min.js"></script>
 		<script src="assets/libs/node-waves/waves.min.js"></script>
 		<!-- toastr plugin -->
 		<script src="assets/libs/toastr/build/toastr.min.js"></script>

 		<!-- toastr init -->
 		<script src="assets/js/pages/toastr.init.js"></script>
 		<!-- Sweet Alerts js -->
 		<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

 		<!-- Sweet alert init js-->
 		<script src="assets/js/pages/sweet-alerts.init.js"></script>

 		<!-- apexcharts -->
 		<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

 		<!-- crypto dash init js -->
 		<script src="assets/js/pages/crypto-dashboard.init.js"></script>

 		<script src="assets/js/app-dark.js"></script>
 		<!-- Required datatable js -->
 		<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
 		<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
 		<!-- Buttons examples -->
 		<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
 		<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
 		<script src="assets/libs/jszip/jszip.min.js"></script>
 		<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
 		<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
 		<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
 		<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
 		<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
 		<!-- Responsive examples -->
 		<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
 		<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
 		<!-- toastr plugin -->
 		<script src="assets/libs/toastr/build/toastr.min.js"></script>
 		<!-- toastr init -->
 		<script src="assets/js/pages/toastr.init.js"></script>
 		<!-- Datatable init js -->
 		<script src="assets/js/pages/datatables.init.js"></script> 
 		<!-- Ion Range Slider-->
 		<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
 		<!-- Range slider init js-->
 		<script src="assets/js/pages/range-sliders.init.js"></script>
 		<script src="assets/libs/parsleyjs/parsley.min.js"></script>
 		<script src="assets/js/pages/form-validation.init.js"></script>
 		<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="1ac317b0-8cf4-4fc3-b8e0-2c3c4cf5df59";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
 	</body>

