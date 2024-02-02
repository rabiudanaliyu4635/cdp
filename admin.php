<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="admincss.css">
		<title>Admin</title>
		<link rel="icon" type="image/x-icon" href="icons\favi.ico">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/site.css">
		<link rel="stylesheet" href="nucleo/css/nucleo.css">
		<link rel="stylesheet" href="fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="admincss.css">
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
								<a class="nav-link active navbtn" href="projects.php">&nbsp Profile &nbsp</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link navbtn" href="volunteers.php">&nbsp Admin &nbsp </a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item dbtn" href="adminprofile.php">Admin Profile ( )<span class="sr-only">(current)</a>
									<a class="dropdown-item dbtn" data-toggle="modal" data-target="#sign-out" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="modal fade" id="sign-out">
					<div class="modal-dialog">
						<div class="modal-content">
					    	<div class="modal-header">
					         	<h4 class="modal-title">Are you sure?</h4>
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <div class="modal-footer">
					            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
					            <form action="logout.php" method="post">
					            	<input type="submit" class="btn btn-danger" value="Log out">
					            </form>
					            
					        </div>
					    </div>
					</div>
				</div>
			</header>
			<main>
			<div class="sidebar">
            <ul class="nav-links">
            <li>
                <a href="">
                    <span class="link_name"> MAIN NAVIGATION</span>
                </a>
            </li>
            <li>
                <a href="admindashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="icons-links">
                    <a href="profile.php">
                    <i class='bx bx-calendar-check'></i>
                        <span class="link_name">Profile</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="">Profile</a></li>
                    <li><a href="profile.php">Admin Profile</a></li>
                </ul>
            </li>
            
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bxs-user-plus'></i>
                        <span class="link_name">Volunteers</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Volunteers</a></li>
                        <li><a href="add-new-volunteer.php">Add Volunteer</a></li>
                        <li><a href="volunteers.php">View Volunteers</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-calendar-check'></i>
                        <span class="link_name">Projects</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Projects</a></li>
                        <li><a href="add-project.php">Add Project</a></li>
                        <li><a href="projects.php">View Project Records</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-buildings'></i>
                        <span class="link_name">Organizations</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Organizations</a></li>
                        <li><a href="organizations.php">List of Organizations</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-donate-heart'></i>
                        <span class="link_name">Donations</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Donations</a></li>
                        <li><a href="add-project.php">Donors</a></li>
                        <li><a href="add-project.php">Donation Records</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e)=>{
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        console.log(sidebar);
    </script>
			</main>
		</div>