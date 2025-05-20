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

function xss_cleaner($input_str) {
  $return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
  $return_str = str_ireplace( '%3Cscript', '', $return_str );
  return $return_str;
}

require 'denial/config.php';
require 'denial/init.php';
if ($user -> LoggedIn())
{
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<head>
  <script>
    function login()
    {
      var username=$('#loginusername').val();
      var password=$('#loginpassword').val();
      document.getElementById("logindiv").style.display="none";
      document.getElementById("loginimage").style.display="inline";
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
         document.getElementById("logindiv").innerHTML=xmlhttp.responseText;
         document.getElementById("loginimage").style.display="none";
         document.getElementById("logindiv").style.display="none";
         if (xmlhttp.responseText.search("Redirecting") != -1)
         {
          Command: toastr["success"]("Redirecting to Dashboard.", "Success")

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
    xmlhttp.open("POST","ajax/login.php?type=login",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("username=" + username + "&password=" + password);
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
            <div id="logindiv" style="display:none"></div>
            <img id="loginimage"  style="display:inline-block;"/>
          </span>
          <div class="card overflow-hidden">
            <div class="bg-soft-primary">
              <div class="row">
                <div class="col-7">
                  <div class="text-primary p-4">
                    <h5 class="text-white">Welcome Back !</h5>
                    <p class="text-white">Sign in to continue to.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0"> 
              <div>
                <a>
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                      <img src="assets/images/favicon.ico" alt="" class="rounded-circle" height="34">
                    </span>
                  </div>
                </a>
              </div>
              <div class="p-2">
                <form class="form-horizontal" action="index.php">

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="loginusername" class="form-control" placeholder="Your username..">
                  </div>

                  <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" id="loginpassword" class="form-control" placeholder="Your password..">
                  </div>
                  <div class="mt-3">
                    <button  type="button" onclick="login()" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                  </div>
                  <div class="mt-5 text-center">

                    <div>
                      <p><a href="register.php" class="font-weight-medium text-primary"> Register Now </a> </p>
                    </div>
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
  <script type="text/javascript">

    $("#signinForm").validate({
      rules: {
       login: "required",
       password: "required"
     },
     messages: {
       firstname: "Please enter your login",
       lastname: "Please enter your password"			
     }
   });
 </script>
 <?php
 require('xwaf.php');
 $xWAF = new xWAF();
 $xWAF->start();
 ?>  

</script>
</body>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="1ac317b0-8cf4-4fc3-b8e0-2c3c4cf5df59";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</html>