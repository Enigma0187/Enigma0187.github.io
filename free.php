<?php
include("header.php");
$paginaname = 'Hub';
?>
<!DOCTYPE html>
<?php
$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
$plansql -> execute(array(":id" => $_SESSION['ID']));
$rowxd = $plansql -> fetch();
$name = $getInfo['name'];									
$date = date("d/m/Y, h:i a", $rowxd['expire']);									
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="clearfix"></div>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">			
			<script>
			  xmlhttp.open("GET","ajax/hub.php?type=attacks",true);
			  xmlhttp.send();

			  function start()
			  {
			  	launch.disabled = true;
			  	var host=$('#host').val();
			  	var time=$('#time').val();
			  	var mode=$('#mode').val();
			  	var method=$('#method').val();
			  	var head=$('#head').val();
			  	var ratelimit=$('#ratelimit').val();
			  	var cookie=$('#cookie').val();
			  	var refer=$('#refer').val();
			  	var geo=$('#geo').val();
			  	document.getElementById("div").style.display="none"; 
			  	document.getElementById("image").style.display="inline"; 
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
			  		launch.disabled = false;
			  		document.getElementById("div").innerHTML=xmlhttp.responseText;
			  		document.getElementById("image").style.display="inline";
			  		document.getElementById("div").style.display="inline";
			  		if (xmlhttp.responseText.search("success") != -1)
			  		{
			  			Command: toastr["success"]("In a few seconds, the attack will be launched", "Loading ...")

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
			  xmlhttp.open("GET","ajax/free.php?type=start" + "&host=" + host + "&time=" + time + "&mode=" + mode + "&method=" + method + "&head=" + head + "&ratelimit=" + ratelimit + "&cookie=" +  cookie + "&refer=" + refer + "&geo=" + geo,true);
			  xmlhttp.send();
			}
			function stop(id)
			{
				st.disabled = true;
				document.getElementById("div").style.display="none";
				document.getElementById("image").style.display="inline"; 
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
			  		st.disabled = false;
			  		document.getElementById("div").innerHTML=xmlhttp.responseText;
			  		document.getElementById("image").style.display="none";
			  		document.getElementById("div").style.display="none";
			  		if (xmlhttp.responseText.search("success") != -1)
			  		{
			  			Swal.fire({
			  				position: "top-end",
			  				title:'Attack stopped', 
			  				type: 'info',
			  				toast: true,
			  				showConfirmButton: false,
			  				timer: 4500
			  				
			  			});
			  			snd.play();
			  			attacks();
			  			window.setInterval(attacks(), 2000);
			  		} else {

			  			Swal.fire({
			  				position: "top-end",
			  				title:'Something is wrong..', 
			  				type: 'info',
			  				toast: true,
			  				showConfirmButton: false,
			  				timer: 4500
			  				
			  			});
			  			
			  		}
			  	}
			  }
			  xmlhttp.open("GET","ajax/hub.php?type=stop" + "&id=" + id,true);
			  xmlhttp.send();
			}
		</script>
		<script>
			function advance() {
				var check = document.getElementById("method");
				if(check.value == 'POST') {
					document.getElementById("show").style.display = "block";
				}
				else {
					document.getElementById("show").style.display = "none";
				}
			}

		</script>
		<div class="alert alert-danger col-sm-12 text-center">Free hub temporarily unavailable</div>	
		<div id="divall" style="display:inline"></div>
		<div id="div" style="display:inline"></div>
		<img id="image" style="display:none"/>		
		<div class="row">		
			<div class="col-sm-5">
				<blockquote>Attack Manager</blockquote>
				<div class="card">
					<div class="card-body">
						<form method="POST">
							<div class="form-group">
								<blockquote>Target</blockquote>
								<input type="text" id="host" placeholder="http://example.com" class="form-control">
							</div>
							<div class="form-group"><label for="time">Attack Time</label><input class="custom-range mt-1" min="0" max="150"  oninput="this.form.time.value=this.value" type="range"><input class="form-control" id="time" name="time" type="text" value="150" oninput="this.id.timeRange.value=this.value"></div>
							<button class="btn btn-secondary btn-rounded waves-effect waves-light col-sm-12 align-center collapsed disabled" type="button" data-toggle="collapse" data-target="#setting" aria-expanded="false" aria-controls="setting">
								<i class="bx bx-cog bx-spin font-size-16 align-middle mr-2"></i>
								Advanced settings(Paid Options)
							</button>
							<div class="collapse disabled" id="1" style="">
							</br>
							<div class="form-group row">
								<div class="col-sm-6">									
									<blockquote for="method2">Request Method</blockquote>
									<select class="form-control" id="method" name="method" onclick="advance()">
										<option value="GET">GET</option>
										<option disabled value="HEAD">HEAD</option>
										<option disabled value="POST">POST</option>
										<option disabled value="PUT">PUT</option>
										<option disabled value="CONNECT">CONNECT</option>
										<option disabled value="DELETE">DELETE</option>
									</select>
								</div>
								<div class="col-sm-6">								
									<blockquote>Ratelimit</blockquote>
									<select disabled id="ratelimit" class="form-control" id="basic-select">
										<option value="false">OFF</option>
										<option value="true">ON</option>
									</select>
								</div>
							</div>
							<div class="form-group" id="show" style="display: none;">
								<blockquote>POSTDATA - Working for POST</blockquote>
								<input type="text" id="head" value="false"  placeholder="%RAND%" class="form-control">
							</div>					
							<div class="form-group">
								<blockquote>Cookie</blockquote>
								<input type="text" id="cookie" placeholder="PHPSESSID=7h8308ccq3gjprqsj9s4g3aig9 (optional)" class="form-control">
							</div>
							<div class="form-group" id="refershow">
								<blockquote>Refers</blockquote>
								<input type="text" id="refer" value="https://www.google.com" class="form-control">
							</div>
						</div>
						<div class="form-group">									
							<div>
							</br>
							<blockquote>Mode</blockquote>
							<select class="form-control" id="mode" name="mode">
								<optgroup label="Mode">
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = '6' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
								</optgroup>										
							</select>
						</div>
					</div>
												<div class="form-group">								
								<blockquote for="geo">Country select (Paid Options)</blockquote>
									<select class="form-control" id="geo">
								<optgroup label="Country List" disabled>
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `geo` ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) 
										if ($user -> isPremium($odb))
										{
											$name     = $getInfo['name'];
											$fullname = $getInfo['fullname'];
											echo '<option class="text-warning" " value="' . $name . '">' . $fullname . '</option>';
										}
										else
										{
											$name     = $getInfo['name'];
											$fullname = $getInfo['fullname'];
											echo '<option class="text-danger"disabled value="' . $name . '">' . $fullname . '</option>';
										}
										?>
									</optgroup>
									</select>
							</div>
					<button  id="launch" onclick="start()" class="btn btn-success btn-rounded waves-effect waves-light col-sm-12 align-center" type="submit">
						<i class="bx bx-loader bx-spin font-size-16 align-middle mr-2"></i>
						Launch Attack 
					</button>
				</div>								
			</form>
		</div>
	</div>
	<div class="col-sm-7 grid-margin stretch-card">
		<blockquote>Running Attack</blockquote>
		<div class="card">
			<div class="card-body">
				<form method="POST">
					<div class="table-responsive">
						<table class="table table table-bordered mb-0">
							<thead>
								<tr>
									<th style="font-size: 12px;">Host</th>
									<th style="font-size: 12px;">Time</th>
									<th style="font-size: 12px;">Mode</th>
									<th style="font-size: 12px;">Server</th>
								</tr>
							</thead>
							<tbody>
								<?php	
								$SQLSelect = $odb->query("SELECT * FROM `logs` WHERE user='{$_SESSION['username']}' AND `stopped` = 0 AND `time` + `date` > UNIX_TIMESTAMP()");
								while ($show = $SQLSelect->fetch(PDO::FETCH_ASSOC)) {

									$id = $show['id'];		
									$name = $show['user'];	
									$time = $show['time'];
									$IP = $show['ip'];
									$method = $show['method'];
									$mode  = $odb->query("SELECT `fullname` FROM `methods` WHERE `name` = '{$show['mode']}' LIMIT 1")->fetchColumn(0);
									$ratelimit = $show['ratelimit'];
									$head = $show['head'];
									$cookie = $show['cookie'];
									$refer = $show['refer'];
									$handler = $show['handler'];
									$date = strftime("%d %B - %H:%M" ,$show['date']);

									$cible = $show['date']+$show['time'];

									$now = time();

									$seconde = $cible - $now;

									?>
									<script>
										var count<?php echo $id; ?>=<?php echo ($seconde < 10 ? "0". $seconde : $seconde); ?>;
										var counter<?php echo $id; ?>=setInterval(stress<?php echo $id; ?>, 1000);
										function stress<?php echo $id; ?>()
										{
											count<?php echo $id; ?>=count<?php echo $id; ?>-1;
											if (count<?php echo $id; ?> <= 0)
											{
												clearInterval(counter<?php echo $id; ?>);
												return;
											}
											document.getElementById("stress<?php echo $id; ?>").innerHTML=count<?php echo $id; ?>;
										}
									</script>
									<tr>
										<td style="font-size: 12px;"><?php echo htmlspecialchars($IP); ?></td>
										<td style="font-size: 12px;"><span id="stress<?php echo $id; ?>"></span></td>
										<td style="font-size: 12px;"><?php echo $mode; ?></td>
										<td style="font-size: 12px;"><?php echo $handler; ?></td>
									</tr>
									<?php

								}
								?> 
							</tbody>
						</table>
					</div>
				</form>									
			</div>
		</div>
		<?php
		require('xwaf.php');
		$xWAF = new xWAF();
		$xWAF->start();
		?>
		</html>