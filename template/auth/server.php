<?php
session_start();

// initializing variables
$username = "";
$fullname = "";
$position = "";
$email = "";
$phone = "";
$user = "";
$errors = array();

// connect to the database
include '../../database.php';
$conn = OpenCon();
// connect to the database

// Login user
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM account WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index');
  	}else {
  		array_push($errors, "Wrong Username and/or Password. Please try again");
  	}
  }
}
//Login User

//Close connection
CloseCon($conn);
//Close connection
?>
