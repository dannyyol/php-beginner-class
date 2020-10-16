<?php
session_start();
require_once('database.php');
require_once('process/process.php');
$student_res = $database->read();
$user_res = $database->readUsers();

$current_user = new ProcessData();
$current_user= $current_user->login($database);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in PHP & MySQL - Read</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified JavaScript -->
</head>
<body>
<div class="wrapper">

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
			aria-expanded="false" aria-label="Toggle navigation"></button>
		<div class="collapse navbar-collapse" id="collapsibleNavId">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<?php if($current_user): ?>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
					</li>

				<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">Register <span class="sr-only"></span></a>
					</li>
				<?php endif; ?>      
			</ul>
			
		</div>
	</nav>

	<?php if($current_user): ?>
		<div class="alert alert-info alert-dismissible fade show justify-content-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<strong>You logged in as <?php echo $current_user[2]; ?> !</strong>
		</div>


		<script>
			
			function navigateBack() {
				window.history.back();
			}

		</script>
	<?php endif;?>