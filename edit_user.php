<?php
require_once('process/process.php');

include_once("header.php");


$id = $_GET['id'];
$res = $database->readUsers($id);
$read = mysqli_fetch_assoc($res);
$process_data = new ProcessData();
$process_data->updateUser($database);

if($_SESSION["role"] == 'teacher'): 
?>

	<div class="container">
		<br><br>
		<div class="row align-items-center justify-content-center">
			<div class="col-md-6">

				<!-- Default form login -->
				<form class="text-center border border-light p-5" action="" method="post">

					<p class="h4 mb-4">Update User</p>

					<!-- Email -->
					<input type="email" id="defaultLoginFormEmail" name="email" value="<?php echo $read['email'];?>" class="form-control mb-4" placeholder="E-mail">

					<!-- Password -->
					<input type="password" id="defaultLoginFormPassword" name="password" value="<?php echo $read['passwd'];?>"  class="form-control mb-4" placeholder="Password">

					<br>
					<div class="col-md-12">
						<select name="role" class="form-control">
							<option>Select Your Age</option>
							<option value="student"  <?php echo ($read['role'] == 'student')? "selected":""; ?> >student</option>
							<option value="teacher" <?php echo ($read['role'] == 'teacher')? "selected":""; ?>>teacher</option>

						</select>

					</div>
					
					<!-- Sign in button -->
					<button class="btn btn-info btn-block my-4" name = "submit" type="submit">Sign in</button>

				</form>
				<!-- Default form login -->

				<div class="" style="text-align:center;">
					<button class="btn btn-sm btn-primary" style="margin-bottom: 20px;" onclick="navigateBack()"> Back </button>

				</div>

			</div>
		</div>
	</div>
<?php else:
    include("index.php");
    ?>
    
<?php endif; ?>
