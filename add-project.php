<?php 
session_start();
include_once("config.php");
$uname = '$_SESSION[un]';
$email = '$_SESSION[em]';
$alert = "";
	if (isset($_POST['saveproject'])) {
		$title = htmlspecialchars($_POST['title']);
		$dur = htmlspecialchars($_POST['duration']);
		$date = htmlspecialchars($_POST['date']);
		$time = htmlspecialchars($_POST['time']);
		$loc = htmlspecialchars($_POST['location']);
		$des = htmlspecialchars($_POST['description']);
		$file = htmlspecialchars($_POST['file']);
		


		include_once("config.php");
		if (empty($title) || empty($dur) || empty($date) || empty($time) || empty($loc) ||  empty($des)){
			global $alert;
			$alert = "<div class=".'"p-3 mb-2 bg-danger text-white"'.">Please fill up the form properly.</div>";
		} else {
				if (empty($file)) {
					$file = "No file added";
				} else {
					    $sql = "INSERT INTO projects(title,duration,starting_date,starting_time,location,description,files) VALUES('$title','$dur','$date','$time','$loc','$des','$file')";
						if (mysqli_query($conn,$sql)) {
							global $alert;
							$alert = "<div class=".'"p-3 mb-2 bg-success text-white"'.">Project was created successfully.</div>";
						} else {
							global $alert;
							$alert = "<div class=".'"p-3 mb-2 bg-danger text-white"'.">Could not create the project.".mysqli_error($conn)."</div>";
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
	<title>Add Project</title>
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
			<div class="container mb-5">
				<div class="mb-4 animate__animated animate__fadeInDown">
						<h1>
							<span>New Project</span>
							<span class="float-right">
							    <form action="projects.php">
							    	<button  class="btn btn-outline-info float-right btncmn" id="bckbtn">Go back <i class="fa fa-arrow-circle-left"></i></button>
								</form>	
							</span>
						</h1>
						<hr>	
				</div>
				<form method="post" action="add-project.php">
					
					<div class="animate__animated animate__fadeIn animate__delay-1s ">
						<div>
							<?php 
							echo $alert; ?>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group row">
									<label for="rp-title" class="col-sm-3 col-form-label">Title</label>
									<div class="col-sm-9">
										<input type="text" id="rp-title" class="form-control" autocomplete="off" required name="title">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row">
									<label for="rp-title" class="col-sm-3 col-form-label">Est. Duration</label>
									<div class="col-sm-9">
										<input type="number" placeholder="Number of days" id="rp-title" class="form-control" autocomplete="off" name="duration" required>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Starting Date</label>
									<div class="col-sm-9">
										<input type="date" id="pj-date" class="form-control" name="date" required>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group row">
									<label for="" class="col-sm-3 col-form-label">Starting Time</label>
									<div class="col-sm-9">
										<input type="time" id="pj-time" class="form-control" name="time" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Location</label>
							<div class="col-sm-9">
								<input type="text" id="pj-location" class="form-control" autocomplete="off" name="location" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea id="pj-obj" class="form-control" name="description" required></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Upload a File</label>
							<div class="col-sm-9">
								<div class="custom-file">
								    <input type="File" name="file">
								</div>
							</div>
						</div>
						<div class="text-center mt-5">
							<input type="submit" id="submit-btn-pj" class="btn btn-outline-success btn-lg btncmn" name="saveproject" value="Save Project" >
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
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
		
	</script>
</body>

</html>