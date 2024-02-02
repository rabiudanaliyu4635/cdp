<?php 
session_start();
include_once("config.php");
$uname = $_SESSION['un'];
$email = $_SESSION['em'];
$alert = "";
	if (isset($_POST['addnewvol'])) {
		$fname = htmlspecialchars($_POST['fullname']);
		$org = htmlspecialchars($_POST['organization']);
		$age = htmlspecialchars($_POST['age']);
		$nationality = htmlspecialchars($_POST['nationality']);
		$pnumber = htmlspecialchars($_POST['pnumber']);
		$email = htmlspecialchars($_POST['email']);
		$address = htmlspecialchars($_POST['address']);

		


	//	include_once("config.php");
		if (empty($fname) || empty($org) || empty($age) || empty($nationality) || empty($pnumber) || empty($email) || empty($address)){
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly.</div>";
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly. Enter a valid email.</div>";
		} elseif (!filter_var($pnumber, FILTER_VALIDATE_INT)) {
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly. Enter a valid Phone number.</div>";
		} elseif (!filter_var($age, FILTER_VALIDATE_INT)) {
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly. Enter valid age.</div>";
		} else {
			$sqlcheck1 = "SELECT email FROM volunteers WHERE email = '$email' OR nric = '$nric'";
			$result1 = mysqli_query($conn,$sqlcheck1);
			if (!$result1) {
			    printf("Error: %s\n", mysqli_error($conn));
			}
			$data1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
			mysqli_free_result($result1);

			if (!empty($data1)) {
				$alert = "<div class=".'"alert alert-danger"'.">Volunteer with same email or organization is already registered. Try again.</div>";
			} else {
				$sql = "INSERT INTO volunteers(fullname,organization,age,nationality,phone,email,address) VALUES('$fname','$org','$age','$nationality','$pnumber','$email','$address')";
				if (mysqli_query($conn,$sql)) {
					global $alert;
					$alert = "<div class=".'"alert alert-success"'.">Volunteer has been added successfully.</div>";
				} else {
					global $alert;
					$alert = "<div class=".'"alert alert-danger"'.">Could not add the volunteer.".mysqli_error($conn)."</div>";
				}
			}

		}	
		mysqli_close($conn);
				
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Add new volunteer</title>
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
			<div class="container">
				<div class="mb-4 animate__animated animate__fadeInDown">
						<h3>
							<span>New Volunteer</span>
							<span class="float-right">
							    <form action="volunteers.php">
							    	<button  class="btn btn-outline-info float-right btncmn" id="bckbtn">Go back <i class="fa fa-arrow-circle-left"></i></button>
								</form>	
							</span>
						</h3>
						<hr>	
				</div>
				
				<form method="post" action="add-new-volunteer.php">
					
					<div class="animate__animated animate__fadeIn animate__delay-1s">
						<div>
							<?php 
							echo $alert; ?>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Full Name</label>
									<div class="col-sm-9">
										<input id="vol_fname" type="text" class="form-control" autocomplete="off" name="fullname" required>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Organization</label>
									<div class="col-sm-9">
										<input id="vol_id" type="text" class="form-control" autocomplete="off" name="organization" required>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Age</label>
									<div class="col-sm-9">
										<input id="vol_fname" type="number" class="form-control" autocomplete="off" name="age" required>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Nationality</label>
									<div class="col-sm-9">
										<input id="vol_id" type="text" class="form-control" autocomplete="off" name="nationality" required>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Phone Number</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">+234</span>
										</div>
										<input id="vol_phone" type="text" class="form-control" autocomplete="off" name="pnumber" required>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input id="vol_em" type="email" class="form-control" autocomplete="off" name="email" required>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row">
								<label>Address</label>
								<input type="text" id="vol_address" class="form-control" name="address" required>
							</div>
						</div>
						<div class="text-center mt-5">
							<input type="submit" id="Add-vl-btn" class="btn btn-outline-success btn-lg btncmn" value="Add" name="addnewvol" >
						</div>
						<br>
					</div>
				</form>
			</div>
		</main>
	</div>
	<footer class="text-center text-light bg-dark">
			Copyright © 2023 Charity Donation Platform<br>
			<a href="mailto:info@huhu.com.my">info@cdp.com.my</a>
	</footer>
	

	<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>

	</script>
</body>

</html>