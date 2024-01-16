<?php
	session_start();
	include("db_con/dbCon.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/media.css">
		<title></title>
	</head>
	<body>
		<header class="customnav">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-lg ">
							<a class="navbar-brand cus-a" href="index.php">Find My Lawyer</a>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto ">
									<li class="active">
										<a class="nav-link cus-a" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="">
										<a class="nav-link cus-a" href="lawyers.php">Lawyers</a>
									</li>
									<li class="">
										<a class="nav-link cus-a" href="about_us.php">About Us</a>
									</li>
									<?php if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE){ ?>
										<li class="">
											<a class="nav-link cus-a" href="user_dashboard.php">Dashboard</a>
										</li>
										<li class="">
											<a class="nav-link cus-a" href="logout.php">Logout</a>
										</li>
										<?php }else{ ?>
										<li class="">
											<a class="nav-link cus-a" href="login.php">Login</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle cus-a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Register
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<a class="dropdown-item" href="lawyer_register.php">Register as a lawyer</a>
												<a class="dropdown-item" href="user_register.php">Register as a user</a>
											</div>
										</li>
									<?php }?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<section>
			<div class="banner">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<div class="banner_content">
								<h1>Find Your Suitable Lawyer Here !</h1>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="lawyerscard">
			<div class="container">
				<div class="row">
					<?php
						include_once 'db_con/dbCon.php';
						$conn = connect();
						$result = mysqli_query($conn,"SELECT * FROM user,lawyer WHERE user.u_id=lawyer.lawyer_id AND user.status='Active'");
						while($row = mysqli_fetch_array($result)) {
						?>
						<div class="col-md-4">
							<div class="card" style="width: 18rem;">
								<img src="images/upload/<?php echo $row["image"]; ?>" class="card-img-top cusimg img-fluid" alt="img">
								<div class="card-body">
									<h5 class="card-title"><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></h5>
									<h6 class="card-title"><?php echo $row["speciality"]; ?></h6>
									<h6 class="card-title"><span><?php echo $row["practise_Length"]; ?></span></h6>
									<a class="btn btn-sm btn-info" href="single_lawyer.php?u_id=<?php echo $row["u_id"]; ?>"><i class="fa fa-street-view"></i>&nbsp; View Full Profile</a>
								</div>
							</div>
						</div>
						<?php
						}
					?>
				</div>
			</div>
		</section>
		<section class="aboutus">
			<div class="container">
				<div class="row">
					<div class="col-md-6 ml-auto">
						<h1>About US</h1>
						<p>This website Finding Best Lawyer for you so keeping Support </p>
						<h2>Our Contact details </h2>
						<h4>Address: Government Engineering College, Modasa, Shamlaji Road, Aravali District, Modasa, Gujarat 383315</h4>
						<h4>Contact no. - 02774242634 </h4>
					</div>
					<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.085288633383!2d73.3003306!3d23.4934373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395df194cdabd479%3A0xf669f2347bbb06cf!2sGovernment%20Engineering%20College%2C%20Modasa!5e0!3m2!1sen!2sin!4v1698845300860!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col">
						<h5>All rights reserved by Find My Lawyer 2023</h5>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>