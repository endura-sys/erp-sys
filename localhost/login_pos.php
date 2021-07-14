<?php

$host = "localhost";
$user = $_POST["user"];
$pass = $_POST["pass"];
$db = "db";

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn) {
	$q = "select * from user where user like '$user' and pass like ' $pass'";
	$result = mysqli_query($conn, $q);
}

if (mysqli_num_rows($result) > 0) {
	echo "login successfull...";
} else {
	echo "login failed....! ";
}

?>