<?php 
session_start();
include_once("config.php");

    if(!isset($_SESSION['id'])){
        echo "<script>window.location='adminlogin.php';</script>";
    }
    if(!isset($_SESSION['id'])){
        echo "<script>window.location='adminlogin.php';</script>";
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>CDP | Admin</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" href="nucleo/css/nucleo.css">
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<style>
			main {
				margin-left: 270px;
				margin-right: 30px;
			} 
		</style>
	</head>
	<body class="d-flex flex-column min-vh-100">
	<?php include("admin.php"); ?>
		<div class="wrapper flex-grow-1">
			<main>
				<div class="container mb-3">
					<div class="block-header">
						<h2>Dashboard</h2>
						<small class="text-muted">Welcome to Admin Panel</small>
    				</div>

					<div class="row clearfix">
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="info-box-4 hover-zoom-effect">
								<div class="icon"> <i class="zmdi zmdi-male-female col-blush"></i> </div>
									<div class="content">
										<div class="text">Total Donors</div>
										<div class="number">
												<?php
													$sql = "SELECT * FROM useraccounts WHERE status='Active'";
													$qsql = mysqli_query($conn,$sql);
													echo mysqli_num_rows($qsql);
												?>
										</div>
									</div>
							</div>
						</div>
        				<div class="col-lg-3 col-md-3 col-sm-6">
            				<div class="info-box-4 hover-zoom-effect">
                				<div class="icon"> <i class="zmdi zmdi-account-circle col-cyan"></i> </div>
                					<div class="content">
                    					<div class="text">Total Volunteers </div>
                    					<div class="number">
                       							 <?php
                        							$sql = "SELECT * FROM volunteers WHERE status='Active' ";
                        							$qsql = mysqli_query($conn,$sql);
                        							echo mysqli_num_rows($qsql);
                        						?>
                    					</div>
                					</div>
            					</div>
        					</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="info-box-4 hover-zoom-effect">
								<div class="icon"> <i class="zmdi zmdi-account-box-mail col-blue"></i> </div>
								<div class="content">
									<div class="text">Total Charities</div>
									<div class="number">
										<?php
										$sql = "SELECT * FROM projects WHERE status='Active'";
										$qsql = mysqli_query($conn,$sql);
										echo mysqli_num_rows($qsql);
										?>
									</div>
								</div>
							</div>
						</div>
        				<div class="col-lg-3 col-md-3 col-sm-6">
            				<div class="info-box-4 hover-zoom-effect">
                				<div class="icon"> <i class="zmdi zmdi-money col-green"></i> </div>
                					<div class="content">
                    					<div class="text">Total Earning</div>
                    					<div class="number"># 
                        					<?php 
              									$sql = "SELECT sum(bill_amount) as total  FROM `billing_records` ";
              									$qsql = mysqli_query($conn,$sql);
              									while ($row = mysqli_fetch_assoc($qsql))
              									{ 
               										echo $row['total'];
             									}
              								?>
                    					</div>
                					</div>
            					</div>
        					</div>
    					</div>
				</div>
			</main>
		</div>
		<footer class="text-center text-light bg-dark">
			Copyright © 2024 Charity Donotion Platform<br>
			<a href="mailto:info@huhu.com.my">info@huhu.com.my</a>
		</footer>
		<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript">

			function deleteproj(){
			  var txt;
			  var r = confirm("Are you sure you want to remove this project?");
			  if (r == true) {
			    deleteProcess();
			  }else {
			  	return false;
			  }
			}
			function deleteProcess(username,pw){
				// checkDB
				// if Y -> menu
				// if F -> alert
				window.location.href = 'admindashboard.php';
			}
		</script>
	</body>
</html>