<?php 
require_once('process/process.php');
include('header.php');

session_destroy();
// unset();

header('location:login.php');

?>