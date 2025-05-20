<!DOCTYPE html>
<?php
include("header.php");
$paginaname = 'Dashboard';
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="clearfix"></div>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<div class="col-xl-12">
				<div class="row">
					<div class="col-lg-12">
						<?php
						$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
						$plansql -> execute(array(":id" => $_SESSION['ID']));
						$rowxd = $plansql -> fetch(); 
						$date = date("d/m/Y, h:i a", $rowxd['expire']);
						if (!$user->hasMembership($odb))
						{
							$rowxd['mbt'] = 0;
							$rowxd['concurrents'] = 0;
							$rowxd['name'] = 'No membership';
							$date = 'No membership';
						}
						?>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="media">
											<div class="mr-3">
												<img src="assets/images/logo-light.svg" alt="" class="avatar-md rounded-circle img-thumbnail">
											</div>
											<div class="media-body align-self-center">
												<div class="text-muted">
													<p class="mb-2">Welcome to <?php echo htmlspecialchars($paginaname); ?></p>
													<h5 class="mb-1"><?php echo htmlspecialchars($rowxd['username']); ?> </h5>
													<p class="mb-0 text-white font-weight-bold"><?php echo htmlspecialchars($rowxd['name']); ?> | <?php if ($user->isPremium($odb)) {echo '100%';}else{echo '10%';}?> Power</p>
													<p class="mb-0">Expired: <?php echo $date; ?></p>
												</div>
											</div>
										</div>
									</div>

									<div class="text-muted col-lg-2 font-weight-bold">									
										<p class="mb-0"><i class="bx bx-minus align-middle text-primary mr-1"></i>Concurrent(s): <?php echo $rowxd['concurrents']; ?></p>
										<p class="mb-0"><i class="bx bx-minus align-middle text-primary mr-1"></i>Boot Time: <?php echo $rowxd['mbt']; ?></p>
										<p class="mb-0"><i class="bx bx-minus align-middle text-primary mr-1"></i>Premium:  <?php if ($user->isPremium($odb)) {echo '<td>Yes</td>';}
										else
											{echo '<td>No</td>';}
										?></p>
									</div>
								</div>
								<!-- end row -->
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="mt-2">
									<a class="mb-3 h1 font-weight-bold"><?php echo $stats -> totalUsers($odb);?></a>
								</div>
								<div class="mt-2 w-100">
									<a class="mt-3 h5">Registered Users <i class="bx bxs-user float-right text-muted font-size-24"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="mt-2">
									<a class="mb-3 h1 font-weight-bold"><?php echo $stats -> totalBoots($odb);?></a>
								</div>
								<div class="mt-2 w-100">
									<a class="mt-3 h5">Attacks Today <i class="bx bx-bolt-circle float-right text-muted font-size-24"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card mini-stats-wid">
							<div class="card-body">
								<div class="mt-2">
									<a class="mb-3 h1 font-weight-bold"><?php echo $stats -> runningBoots($odb)+5; ?></a>
								</div>
								<div class="mt-2 w-100">
									<a class="mt-3 h5">Running attacks <i class="bx bx-sort-up float-right text-muted font-size-24"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end row -->
				<!-- start row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title mb-5">News</h4>

								<?php
								$newssql = $odb -> query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3");
								while($row = $newssql ->fetch())
								{
									$id = $row['ID'];
									$title = $row['title'];
									$content = $row['content'];
									$autor = $row['author'];
									$date = $row['date'];
									echo '
									<ul class="verti-timeline list-unstyled">  
									<li class="event-list">
									<div class="event-timeline-dot">
									<i class="bx bx-right-arrow-circle text-warning"></i>
									</div>
									<div class="media">
									<div class="mr-3">
									<i class="bx bx-chat h2 text-success"></i>
									</div>
									<div class="media-body">
									<div>
									<h5>'.htmlspecialchars($title).'<div class="text-muted mb-1" style="font-size: 10px;">Date: '.strftime("%d %B - %H:%M" ,$row['date']).'</div></h5>
									<p class="text-muted">'.htmlspecialchars($content).'</p>
									</div>
									</div>
									</div>
									</li>
									</ul>

									';
								}
								?>  
								<!-- end row -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	require('xwaf.php');
	$xWAF = new xWAF();
	$xWAF->start();
	?>