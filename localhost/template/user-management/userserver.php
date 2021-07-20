<?php
session_start();

// initializing variables
$username = "";
$lastname = "";
$surname = "";
$position = "";
$email = "";
$phone = "";
$user = "";
$errors = array();

// connect to the database
include '../../database.php';
$conn = OpenCon();

if (isset($_POST["submitbtn"])) {


  $lastname = $_POST["lastname"];
  $surname = $_POST["surname"];
  $position = $_POST["position"];
  $email = $_POST["email"];
  $user = $_POST["username"];
  $pw = $_POST["password"];
  $pw2 = $_POST["confirmpassword"];

  if (empty($lastname)) { array_push($errors, "Lastname is required."); }
  if (empty($surname)) { array_push($errors, "Surname is required."); }
  if (empty($position)) { array_push($errors, "Job Position is required."); }
  if (empty($email)) { array_push($errors, "Email is required."); }
  if (empty($user)) { array_push($errors, "Username is required."); }
  if (empty($pw)) { array_push($errors, "Password is required."); }
  if (strlen($pw)<8) {array_push($errors, "The password must contain at least 8 characters.");}
  if (empty($pw2)) { array_push($errors, "Please enter password again."); }
  else if ($pw != $pw2) { array_push($errors, "Passwords do not match."); }

  $sql = "SELECT * from account where username = '$user'";
  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);

  if ($num > 0) {
    array_push($errors, "Username already exists. Please create a new username.");
  }

  if (count($errors) == 0) {

    $employee = 1;

    $sql = "INSERT INTO employee (employee_id, position_id, lastname, surname, email) VALUES('$employee', '$position', '$lastname', '$surname', '$email')";
    $result = $conn->query($sql);

    $sql = "INSERT INTO account (username, password, employee_id) VALUES('$user', '$pw', '$employee')";
    $result = $conn->query($sql);

    header("location: user-management");
  }
}

CloseCon($conn);
?>
