<?php 
session_start();
include_once("config.php");
$uname = '$_SESSION[un]';
$email = '$_SESSION[em]';
$sql2 = "SELECT * FROM volunteers";
$result = mysqli_query($conn,$sql2);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

if (isset($_POST['profile'])) {
	$profile = $_POST['profile'];
	$_SESSION['volprof'] = $profile;
	$url = "volunteer-profile.php";
	//header('Location: ' . $url);
	header('Location: ' . $url);
	mysqli_close($conn);
	exit();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Volunteers</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" href="nucleo/css/nucleo.css">
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<style>main {
  margin-left: 300px;
}</style>
	</head>
	<body class="d-flex flex-column min-vh-100">
	<?php include("admin.php"); ?>
		<div class="wrapper flex-grow-1">
			
			<main>
				<div class="container mb-3">
					<div class="mb-4 animate__animated animate__fadeInDown">
						<h1>
							<span>Volunteers</span>
							<span class="float-right">
								<form action="add-new-volunteer.php">
									<button class='btn btn-info btncmn'>Add New Volunteer</button>	
								</form>
							    
							</span>
						</h1>
						<hr>	
					</div>
					<div class="table-responsive animate__animated animate__fadeIn animate__delay-1s">
						<table class="table table-striped" id="vol-table">
							<thead class="text-primary">
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
							</thead>
							<tbody id="tb-vol">
								<?php
									foreach ($data as $row) { ?>
										<form action="volunteers.php" method="post">
											<tr>
												<td><?php
												echo $row["fullname"]; ?></td>
												<td><?php
												echo $row["email"]; ?></td>
												<td class="btn-group">
														<button id="vol-btn1" type="submit" class="btn btn-outline-secondary" title="Profile" name="profile" value = "<?php 
														echo $profile = $row["nric"]; ?>"><i class="fas fa-user-alt"></i></button>
												</td>
											</tr>
										</form>	
								<?php } ?>	
							</tbody>
						</table>
				
					</div>
				</div>
			</main>
		</div>
		<footer class="text-center text-light bg-dark">
			Copyright © 2020 huhu tools<br>
			<a href="mailto:info@huhu.com.my">info@huhu.com.my</a>
		</footer>
		<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript">

		</script>
	</body>
</html>