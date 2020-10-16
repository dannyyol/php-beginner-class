<?php
include('header.php');
include_once('process/process.php');

$login_user = new ProcessData();
$login_user->login($database);
?>

<div class="container">
    <br><br>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6">

            <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">

            <p class="h4 mb-4">Sign in</p>

            <!-- Email -->
            <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" id="defaultLoginFormPassword"  name="password" class="form-control mb-4" placeholder="Password">

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" name ="submit" type="submit">Sign in</button>

            <!-- Register -->

            </form>
            <!-- Default form login -->

        </div>
    </div>

</div>