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
} 
nav{
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
}
.navbar{
    flex: 1;
    text-align: right;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
    overflow: hidden;

}
.navbar ul li a{
    color: #999;
    text-decoration: none;
    font-size: 16px;
}
.navbar ul li::after{
    content: '';
    width: 0%;
    height: 2px;
    background: #005bc4;
    display: block;
    margin: auto;
    transition: 0.5s;
}
.navbar ul li:hover::after{
    width: 100%;
}
.sub-menu-1 ul li{
  display: none;
}
.navbar li:hover > .sub-menu-1 ul li{
  display: block;
}
.navbar ul li:hover > .sub-menu-1{
  perspective: 1000px;
}

.navbar li:hover > .sub-menu-1 li{
  transform-origin: top center;
  opacity: 0;
}
.navbar li:hover > .sub-menu-1 li:nth-child(1){
  animation: animate 300ms ease-in-out forwards;
  animation-delay: -150ms;
}
.navbar li:hover > .sub-menu-1 li:nth-child(2){
  animation: animate 300ms ease-in-out forwards;
  animation-delay: 0ms;
}
@keyframes animate {
    0% {
        opacity: 0;
        transform: rotateX(-90deg);
    }
    50%{
        transform: rotateX(20deg);
    }
    100%{
        opacity: 1;
        transform: rotateX(0deg);
    }
}

        @media(max-width: 700px){
            .text-box h1{
                font-size: 20px;
            }
            .navbar ul li{
                display: block;
            }
            .navbar{
                position: absolute;
                background: #005bc4;
                height: 100vh;
                width: 200px;
                top: 0;
                right: -40px;
                text-align: left;
                z-index: 2;
                transition: 1s;
            }
            nav .fa{
                display: block;
                color: #fff;
                margin: 20px;
                font-size: 20px;
                cursor: pointer;
            }
            .navbar ul{
                padding: 30px;
                
            }
        }
</style>
</head>
<body class="d-flex flex-column min-vh-100">
		<div class="wrapper flex-grow-1">
			<header>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
					<div class="container">
						<a class="navbar-brand" href=""><i class="fas fa-hand-holding-heart"></i> Charity Donation Platform</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="index.php">Home</a>
								</li>
							</ul>
						</div>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="about-us.php">About Us</a>
								</li>
							</ul>
						</div>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="register.php">User Register</a>
								</li>
							</ul>
						</div>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">Login</a>
									<div class="sub-menu-1">
										<ul>
                                			<li><a href="adminlogin.php">Admin</a></li>
                                			<li><a href="userlogin.php">Donor</a></li>
                            			</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
</body>
</html>