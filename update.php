<?php
require_once('process/process.php');

include_once("header.php");

$id = $_GET['id'];
$res = $database->read($id);
$read = mysqli_fetch_assoc($res);
$process_data = new ProcessData();
$process_data->updateStudent($database);
 

?>
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6">

            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">

				<p class="h4 mb-4">Update New Student</p>

				<!-- fname -->
				<input type="text" name ="fname" id="defaultLoginFormEmail"  value="<?php echo $read['firstname'];?>" class="form-control mb-4" placeholder="Enter First Name">

				<!-- lname -->
				<input type="text" name="lname" id="defaultLoginFormPassword"  value="<?php echo $read['lastname'] ?>" class="form-control mb-4" placeholder="Enter Last Name">
				
				<!-- email -->
				<input type="email" name="email" id="defaultLoginFormPassword" value="<?php echo $read['email'] ?>" class="form-control mb-4" placeholder="Enter Email">

				<div class="row">
					<div>
						<!-- Remember me -->
						<div class="custom-control custom-radio">
						
							<label for="input-id" class="col-md-2" style="padding-right:80px;">Gender</label>
								
							<label>
								<input type="radio" name="gender" id="optionsRadios1" value="male" <?php if($read['gender'] == 'male'){ echo "checked";} ?>>Male
							</label>

							<label>
								<input type="radio" name="gender"  style="padding-right: 100px;" id="optionsRadios1"  value="female" <?php if($read['gender'] == 'female'){ echo "checked";} ?>> Female
							</label>
						</div>
					</div>
					<div>
						<!-- Forgot password -->
					<select name="age" class="form-control">
						<option>Select Your Age</option>
						<?php for ($count=16; $count <= 30 ; $count++): ?>
							<option value="<?= $count; ?>" <?php if($read['age'] == $count){ echo "selected";} ?>><?= $count; ?></option>
						<?php endfor; ?>
					</select>
					</div>
				</div>

				<!-- Sign in button -->
				<button class="btn btn-primary btn-block my-4" type="submit">Create Student</button>

            </form>
            <!-- Default form login -->

        </div>
    </div>

</div>

</div>
</body>
</html>