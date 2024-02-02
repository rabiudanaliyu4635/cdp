<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>CDP</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" href="nucleo/css/nucleo.css">
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<style>.hero-section {
  position:relative;
  background:url("assets/images/poor.jpg") no-repeat center center;
  background-size:cover;
  min-height:400px;
  color:#fff;
} </style>
	</head>
	<body class="d-flex flex-column min-vh-100">
		<?php include 'header.php';?>
		<div class="wrapper flex-grow-1">
			
			<main>
			<section class="hero-section">
			<div class="hero-mask">
			</div><!--//hero-mask-->
			<div class="container text-center py-5">
				<div class="single-col-max mx-auto">
					<div class="hero-heading-upper pt-3 mb-3">Make Your Donation to Need <br class="d-md-none">Ones</div>
					<h1 class="hero-heading mb-5">
						<span class="brand mb-4 d-block"><span class="text-highlight pr-2">"</span><span class="name">Giving is not just about making a donation. It is about making a difference.</span><span class="text-highlight pl-2">"</span></span>
					    <span class="desc d-block">Give a helping hand to children who NEED</span>
				    </h1>
					<div class="text-center mb-5">
						<a href="donation_form.php" class="btn btn-primary btn-lg scrollto">Donate Now</a>
					</div>
					
					<div class="hero-summary">
						<div class="row">
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-video me-2"></i> Charities</div>
								<h4 class="summary-heading">80+ <span class="desc">Donees</span></h4>
								
							</div><!--//col-->
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-clock me-2"></i> Education</div>
								<h4 class="summary-heading">20 <span class="desc">Schools</span></h4>
								
							</div><!--//col-->
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-user-circle me-2"></i> Medical Emergencies</div>
								<h4 class="summary-heading">50+ <span class="desc">Patients</span></h4>
								
							</div><!--//col-->

						</div><!--//row-->
					</div><!--//hero-summary-->
				</div><!--//single-col-max-->
			</div><!--//container-->
			
		</section><!--//hero-section-->
			</main>
		</div>
		<footer class="text-center text-light bg-dark">
			Copyright © 2023 Charity Donation Platform<br>
			<a href="mailto:info@huhu.com.my">info@cdp.com.my</a>
		</footer>

		<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
		<script type="text/javascript">
			
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
				window.location.href = 'profile.php';
			}
		</script>
	</body>
</html>
