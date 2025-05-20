<?php
require 'denial/config.php';
require 'denial/init.php';
session_start();
unset($_SESSION['captcha']);
$_SESSION['captcha'] = rand(1, 100);
$x1 = rand(2,10);
$x2 = rand(1,10);
$x = SHA1(($x1 + $x2).$_SESSION['captcha']);
if ($user -> LoggedIn())
{
	header('Location: index.php');
}
?>
<head>
	<script>
		function register()
		{
			var username=$('#username').val();
			var password=$('#password').val();
			var rpassword=$('#rpassword').val();
			var scode=$('#scode').val();
			var question=$('#question').val();
			var answer="<?php echo $x; ?>";
			document.getElementById("registerdiv").style.display="none";
			document.getElementById("registerimage").style.display="inline"; 
			var xmlhttp;
			if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		  else
		  {// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function()
		  {
		  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  	{
		  		document.getElementById("registerdiv").innerHTML=xmlhttp.responseText;
		  		document.getElementById("registerimage").style.display="none";
		  		document.getElementById("registerdiv").style.display="none";
		  		if (xmlhttp.responseText.search("Redirecting") != -1)
		  		{
		  			Command: toastr["success"]("Redirecting to Login.", "Success")

		  			toastr.options = {
		  				"closeButton": true,
		  				"debug": true,
		  				"newestOnTop": true,
		  				"progressBar": true,
		  				"positionClass": "toast-top-right",
		  				"preventDuplicates": false,
		  				"onclick": null,
		  				"showDuration": 200,
		  				"hideDuration": 300,
		  				"timeOut": 2000,
		  				"extendedTimeOut": 300,
		  				"showEasing": "swing",
		  				"hideEasing": "swing",
		  				"showMethod": "fadeIn",
		  				"hideMethod": "fadeOut"
		  			}
		  		} else {

		  			Command: toastr["error"]("Something is wrong..")

		  			toastr.options = {
		  				"closeButton": true,
		  				"debug": true,
		  				"newestOnTop": true,
		  				"progressBar": true,
		  				"positionClass": "toast-top-right",
		  				"preventDuplicates": false,
		  				"onclick": null,
		  				"showDuration": 200,
		  				"hideDuration": 300,
		  				"timeOut": 2000,
		  				"extendedTimeOut": 300,
		  				"showEasing": "swing",
		  				"hideEasing": "swing",
		  				"showMethod": "fadeIn",
		  				"hideMethod": "fadeOut"
		  			}
		  			
		  		}
		  	}
		  }
		  xmlhttp.open("POST","ajax/login.php?type=register",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("username=" + username + "&password=" + password + "&rpassword=" + rpassword + "&scode=" + scode + "&question=" + question + "&answer=" + answer);
		}
	</script>		
	<title><?php echo htmlspecialchars($sitename); ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

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
	<body>
		<div class="account-pages my-5 pt-sm-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6 col-xl-5">
						<span>  
							<div id="registerdiv" style="display:none"></div>
							<img id="registerimage"  style="display:inline-block;"/>
						</span>
						<div class="card overflow-hidden">
							<div class="bg-soft-primary">
								<div class="row">
									<div class="col-7">
										<div class="text-white p-4">
											<h5 class="text-white">Free Register</h5>
										</div>
									</div>
									<div class="col-5 align-self-end">
										<img src="assets/images/profile-img.png" alt="" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="card-body pt-0"> 
								<div>
									<a >
										<div class="avatar-md profile-user-wid mb-4">
											<span class="avatar-title rounded-circle bg-light">
												<img src="assets/images/favicon.ico" alt="" class="rounded-circle" height="34">
											</span>
										</div>
									</a>
								</div>
								<div class="p-2">
									<form class="form-horizontal">

										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" id="username" class="form-control" placeholder="Username">      
										</div>

										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" id="password" class="form-control" placeholder="Password">
										</div>

										<div class="form-group">
											<label for="password">Verify Password</label>
											<input type="password" id="rpassword" class="form-control" placeholder="Verify Password">        
										</div>

										<div class="form-group">
											<label for="password">Your Code 4 digits</label>
											<input type="text" id="scode" class="form-control" placeholder="Secret Code, 4 digits">      
										</div>

										<div class="form-group">
											<label for="password">Captcha</label>
											<input type="text" id="question" class="form-control" required autocomplete="off" placeholder="<?php echo ''.$x1.'+'.$x2.'?'; ?>">        
										</div>

										<div class="mt-4">
											<button  type="button" onclick="register()" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
										</div>

										<div class="mt-4 text-center">
											<p class="mb-0">By registering you agree to the StressCloud <a href="tos.php" class="text-primary">Terms of Use</a></p>
											<p>Already have an account ? <a href="login.php" class="font-weight-medium text-primary"> Login</a> </p>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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

		<!-- Datatable init js -->
		<script src="assets/js/pages/datatables.init.js"></script> 
		<!-- Ion Range Slider-->
		<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

		<!-- Range slider init js-->
		<script src="assets/js/pages/range-sliders.init.js"></script>

		<script src="assets/libs/parsleyjs/parsley.min.js"></script>

		<script src="assets/js/pages/form-validation.init.js"></script>
	</body>
	<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="1ac317b0-8cf4-4fc3-b8e0-2c3c4cf5df59";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
	</html>