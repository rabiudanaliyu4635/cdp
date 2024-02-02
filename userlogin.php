<?php /*
	$alert = "";
	if (isset($_POST['Login'])) {
		$uname = htmlspecialchars($_POST['uname']);
		$pass = htmlspecialchars($_POST['pass']);
		include_once("config.php");
		if (empty($uname) || empty($pass)){
			global $alert;
			$alert = "<div class=".'"p-3 mb-2 bg-danger text-white"'.">Please fill up the required fields properly.</div>";
		} else {
			$sqlcheck1 = "SELECT * FROM useraccounts WHERE username = '$uname'";
			$result1 = mysqli_query($conn,$sqlcheck1);
			if (!$result1) {
			    printf("Error: %s\n", mysqli_error($conn));
			}
			$data1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
			
			mysqli_free_result($result1);

			if (empty($data1)) {
				$alert = "<div class=".'"alert alert-danger"'.">No user found, enter vaild user-name.</div>";
			} else {
				$inpass = "";
				$un = "";
				$em = "";
				foreach ($data1 as $col) {
					global $inpass;
					global $un;
					global $em;
					$inpass = $col['password'];
					$un = $col['username'];
					$em = $col['email'];
				}
				$passcheck = password_verify($pass, $inpass);
				if ($passcheck == false) {
					global $alert;
					$alert = "<div class=".'"alert alert-danger"'.">Wrong Password.</div>";
				} else if ($passcheck == true) {
					global $alert;
					$alert = "<div class=".'"alert alert-success"'.">Logged in!.</div>";
					session_start();
					$_SESSION['un'] = $un;
					$_SESSION['em'] = $em;
					header('location: dashh.php');
				} else {
					global $alert;
					$alert = "<div class=".'"alert alert-danger"'.">Wrong Password.</div>";
				}
			}
		}
		mysqli_close($conn);
	} */
?>
<?php
session_start();

?>
<?php
error_reporting(0);
include("config.php");

?>
<?php 
$alert = "";
if(isset($_SESSION['user_id']))
{
	echo "<script>window.location='dashh.php';</script>";
}
$err='';
if(isset($_POST['Login']))

{	
	$sql = "SELECT * FROM useraccounts WHERE username='$_POST[username]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($conn,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['user_id']= $rslogin['user_id'] ;
		echo "<script>window.location='dashh.php';</script>";
	}
	else
	{
		$err = "<div class='alert alert-danger'>
		<strong>Oh !</strong> Change a few things up and try submitting again.
	</div>";
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>CDP | User Login</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" href="nucleo/css/nucleo.css">
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	</head>
	<body class="d-flex flex-column min-vh-100">
		<div class="wrapper flex-grow-1">
			<header>
			<?php include 'header.php';?>
			</header>
			<main>
				<div class="container ">
					<div class="text-center animate__animated animate__backInDown">
						<h2 class="font-italic">Charity Donation Platform</h2>
						<i class="fas fa-hand-holding-heart fa-5x p-3"></i>
						<hr>
					</div>
					<br>

					<form action="dashh.php" method="post" class="animate__animated animate__fadeIn animate__delay-1s" onSubmit="return validateform()">
						<h4 class="text-center">User Log In</h4>
						<br>
						<div>
							<?php 
							echo $alert; ?>
						</div>
						<div class="col-sm-4 offset-4 ">
							<div class="form-group">
								<label>Username</label>
								<input id="username" type="text" class="form-control" autocomplete="off" name="uname" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input id="pw" type="Password" class="form-control" autocomplete="off" name="pass" required>
							</div class = "text-center">
						    <br>
							<input type="submit" id="loginBtn" class="btn btn-primary form-control btncmn" value="Login" onclick="loginFunc()" name="login">
							<br>
							<br>
							<div class="text-center">
								<a href="register.php">Register your account</a>
							</div>
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
		<script type="text/javascript">
		/*	
			function loginFunc(){
				username = $('#username').val();
				pw = $('#pw').val();

				if(username === '' || pw === ''){
					alert("Please enter valid username or password");
				}
				else{
					loginProcess(username,pw);
				}
			}
			function loginProcess(username,pw){
				// checkDB
				// if Y -> menu
				// if F -> alert
				window.location.href = 'dashh.php';
			}*/
		</script>
		<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmpatlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatlogin.loginid.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatlogin.password.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatlogin.password.focus();
		return false;
	}
}
	</script>
	</body>
</html>
