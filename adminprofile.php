<?php 
session_start();
include_once("config.php");
$alert="";
$uname = '$_SESSION[loginid]';
$pass = '$_SESSION[password]';
$username=$uname;
$password=$pass;
$name="";
$password="";
$status="";


$sql2 = "SELECT * FROM adminlogin WHERE loginid = '$uname'";
$result = mysqli_query($conn,$sql2);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

foreach ($data as $row) {
	$adminname = $row['name'];
	$username = $row['loginid'];
	$password = $row['password'];
	$adminstatus = $row['Active'];
	
}
#update
if (isset($_POST['update'])) {
		$adminname = htmlspecialchars($_POST['fname']);
		$username = htmlspecialchars($_POST['loginid']);
		$password = htmlspecialchars($_POST['password']);
		$adminstatus = htmlspecialchars($_POST['Active']);

		if (empty($adminname) || empty($username) || empty($password) || empty($adminname)){
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly.</div>";
		} elseif (!filter_var($userphone, FILTER_VALIDATE_INT)) {
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly. Enter a valid Phone number.</div>";
		} elseif (!filter_var($userzip, FILTER_VALIDATE_INT)) {
			global $alert;
			$alert = "<div class=".'"alert alert-danger"'.">Please fill up the form properly. Enter valid zip.</div>";
		} else {
				$sql = "UPDATE adminlogin
						SET name = '$adminname', password= '$password'
						WHERE loginid = '$adminname'";
				if (mysqli_query($conn,$sql)) {
					global $alert;
					$alert = "<div class=".'"alert alert-success"'.">User profile has been updated.</div>";
				} else {
					global $alert;
					$alert = "<div class=".'"alert alert-success"'.">Could not update the user information.".mysqli_error($conn)."</div>";
				}
			

		}	
		
}
#changepass
$oass="";
if (isset($_POST['submitpass'])) {
	foreach ($data as $row) {
		global $pass;
		$pass = $row['password'];
	}
	$oldpass = htmlspecialchars($_POST['oldpass']);
	$newpass = htmlspecialchars($_POST['newpass']);
	$conpass = htmlspecialchars($_POST['conpass']);
	$passcheck = password_verify($oldpass, $pass);
	if ($passcheck == false) {
		global $alert;
		$alert = "<div class=".'"alert alert-danger"'.">Wrong Password.</div>";
	} else if ($passcheck == true) {
		//$finalpasscheck = password_verify($oldpass, $newpass);
		if ($newpass !== $conpass) {
			$alert = "<div class=".'"alert alert-danger"'.">Please retype the password correctly.</div>";
		} else if ($newpass === $conpass){
			$hashedpass = password_hash($conpass, PASSWORD_DEFAULT);
			$passsql = "UPDATE adminlogin
						SET password = '$hashedpass'
						WHERE loginid = '$uname'";
			if (mysqli_query($conn,$passsql)) {
					global $alert;
					$alert = "<div class=".'"alert alert-success"'.">User password has been updated.</div>";
				} else {
					global $alert;
					$alert = "<div class=".'"alert alert-danger"'.">Could not update the user password.".mysqli_error($conn)."</div>";
				}
		}
		
	}
	
} 


mysqli_close($conn);
 ?>


 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>User Profile</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" type="text/css" href="nucleo/css/nucleo.css">
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
		<div class="wrapper flex-grow-1">
		<?php include("admin.php"); ?>
			
			<main>
				<div class="container">
					
						
						<div class="mb-4 animate__animated animate__fadeInDown">
							<h2>
								<span>Admin details</span>
								<span class="float-right">
								    <form action="">
								    	<button type="button" onclick="upd_profile()" class="btn btn-outline-info btncmn">Edit profile</button>
								    	<button type = "button" class="btn btn-outline-info btncmn" data-toggle="modal" data-target="#changePwModal">Change password</button>

										<a href="deleteuser.php" class="btn btn-danger btncmn">Delete account</a>
									</form>	
								</span>
							</h2>
							<hr>	
						</div>
						<div class="animate__animated animate__fadeIn animate__delay-1s">
							<?php 
							echo $alert; ?>
						</div>
						<div class="modal fade" id="changePwModal" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Change Password</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="profile.php" method="post">
											<div class="modal-body">
												<div class="form-group row">
													<label class="col-4 col-form-label">Old Password</label>
													<input type="password" class="col-5 form-control" id="oldPw" name="oldpass" required="">
												</div>	
												<div class="form-group row">
													<label class="col-4 col-form-label">New Password</label>
													<input type="password" class="col-5 form-control" id="newPw" name="newpass" required="">
												</div>
												<div class="form-group row">
													<label class="col-4 col-form-label">Confirm Password</label>
													<input type="password" class="col-5 form-control" id="cnewPw" name="conpass" required="">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" class="btn btn-outline-secondary" value="Change" name="submitpass">
											</div>
										</form>
									</div>
								</div>
							</div>
						<form method="post" action="profile.php">	
							<div class="col-md-6 animate__animated animate__fadeIn animate__delay-1s">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label">Full Name</label>
									<div class="col-sm-9">
										<input id="fname" type="text" class="form-control" readonly="" autocomplete="off" name="fname" value="<?php echo $adminname; ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Username</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">@</span>
												</div>
												<input type="text" id="loginid" readonly="" class="form-control" autocomplete="off" value="<?php echo $username; ?>" name="loginid">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Password</label>
											<input id="password" type="password" class="form-control" readonly="" autocomplete="off" name="password" value="<?php echo $password; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Status</label>
											<input id="adminstatus" type="text" class="form-control" value="<?php echo $adminstatus; ?>" autocomplete="off" name="password" readonly="">
										</div>
									</div>
								</div>
							
								<br>
								<input type="submit" name="update" id="updateBtn" class="btn btn-outline-primary form-control" onclick="upd_submit()" value="Update" disabled="">
							</div>
						</form>		
				</div>
			</main>
		</div>
		<br>
		<footer class="text-center text-light bg-dark">
			Copyright © 2023 Charity Donation Platform<br>
			<a href="mailto:info@huhu.com.my">info@cdp.com.my</a>
		</footer>
		
		<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function(){
				
			});
			function upd_profile(){
				$('#name').prop('readonly',false);
				$('#loginid').prop('readonly',false);
				$('#password').prop('readonly',false);
				$('#status').prop('readonly',false);
				
			}
			function upd_submit(){
				$('#name').prop('readonly',true);
				$('#loginid').prop('readonly',true);
				$('#password').prop('readonly',true);
				$('#status').prop('readonly',true);
				

				
			}


			document.getElementById("debtn").onclick = function 
			() {
				location.href = "deleteuser.php";
			};
		</script>
	</body>
</html>