<?php
require_once('process/process.php');

include("header.php");

$create_record = new ProcessData();
$create_record->createRecord($database)
?>


<div class="container">
    <br><br><br>
    <?php if(isset($message)):
	?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="row align-items-center justify-content-center">
        <div class="col-md-6">

            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">

                <p class="h4 mb-4">Create New Student</p>

                <!-- fname -->
                <input type="text" name="fname" id="defaultLoginFormEmail" class="form-control mb-4"
                    placeholder="Enter First Name">

                <!-- lname -->
                <input type="text" name="lname" id="defaultLoginFormPassword" class="form-control mb-4"
                    placeholder="Enter Last Name">

                <!-- email -->
                <input type="email" name="email" id="defaultLoginFormPassword" class="form-control mb-4"
                    placeholder="Enter Email">

                <div class="row">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-radio">

                            <label for="input-id" class="col-md-2" style="padding-right:80px;">Gender</label>

                            <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="male" checked> Male
                            </label>

                            <label>
                                <input type="radio" name="gender" style="padding-right: 100px;" id="optionsRadios1"
                                    value="female"> Female
                            </label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <select name="age" class="form-control">
                            <option>Select Your Age</option>
                            <?php for ($count=16; $count <= 30 ; $count++): ?>
                            <option value="<?= $count; ?>"><?= $count; ?></option>
                            <!-- <option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option> -->

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