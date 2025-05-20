	<?php

	function xss_cleaner($input_str) {
		$return_str = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
		$return_str = str_ireplace( '%3Cscript', '', $return_str );
		return $return_str;
	}

	function xss_clean($data)
	{
// Fix &entity\n;
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		do
		{
    // Remove really unwanted tags
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

// we are done...
		return $data;
	}

	include("header.php");
	$paginaname = 'Plans';

	?>
	<!DOCTYPE html>
	<script src="https://shoppy.gg/api/embed.js"></script>
	
	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="wrapper">
					<div class="container-fluid">	 
						<p class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show text-center">All payments are automatic.</p>		
						<div class="row">
							<?php
							$SQLGetPlans = $odb -> query("SELECT * FROM `plans` WHERE `private` = 0 ORDER BY `price` ASC");
							while ($getInfo = $SQLGetPlans -> fetch(PDO::FETCH_ASSOC))
							{
								$name = $getInfo['name'];
								$vip = $getInfo['vip'];
								if($vip == 0)
								{
									$vip = "No";
								}
								else 
								{
									$vip = "Yes";
								}
								$premium = $getInfo['premium'];
								if($premium == 0)
								{
									$premium = "No";
								}
								else 
								{
									$premium = "Yes";
								}
								$price = $getInfo['price'];
								$length = $getInfo['length'];
								$unit = $getInfo['unit'];
								$concurrents = $getInfo['concurrents'];
								$mbt = $getInfo['mbt'];
								$idshop = $getInfo['idshop'];
								$ID = $getInfo['ID'];

								echo '
								<div class="col-xl-3 col-md-6">
								<div class="card plan-box">
								<div class="card-body p-4">
								<div class="media">
								<div class="media-body">
								<h5>'.htmlspecialchars($name).'</h5>
								</div>
								</div>
								<div class="py-6">
								<h4><sup><small>$</small></sup> '.htmlspecialchars($price).'/ <span class="font-size-13">Per month</span></h2>
								</div>
								<div class="text-center plan-btn">
								<a href="#" class="btn btn-primary btn-sm waves-effect waves-light" data-shoppy-product="'.htmlspecialchars($idshop).'">Purchase Now</a>
								</div>

								<div class="plan-features mt-5">
								<p><i class="bx bx-minus text-primary mr-2"></i>Concurrents: '.htmlspecialchars($concurrents).'</p>
								<p><i class="bx bx-minus text-primary mr-2"></i>Boot Time: '.htmlspecialchars($mbt).'</p>
								<p><i class="bx bx-minus text-primary mr-2"></i>Premium: '.htmlspecialchars($premium).'</p>
								<p class="text-warning"><i class="bx bx-minus mr-2"></i>Payment: BTC/ETH.</p>
								</div>
								</div>
								</div>
								</div>';
							}
							?>
							<div class="col-md-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
										<h5 class="text-center text-muted mt-3 mb-12">Custom Plan</h5>
										<div>
											<a href="https://t.me/stresscloudteam" class="btn btn-primary d-block mx-auto col-lg-6 col-mt-2" >Telegram</a>	
										</div>			
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>						
			</div>
		</div>
		</html>
