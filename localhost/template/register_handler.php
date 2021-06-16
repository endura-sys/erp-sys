<!DOCTYPE html>
<html lang="en">
	<body>
		<?php 
		
			$fullname = $_POST["fullname"];
			$position = $_POST["position"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$user = $_POST["username"];
			$pw = $_POST["password"];
			$pw2 = $_POST["confirmpassword"];
			
			include '../database.php';
			$conn = OpenCon();
			$sql = "INSERT INTO user (full_name, position, email, phone, username, password) VALUES('$fullname', '$position', '$email', '$phone', '$user', '$pw')";
			$result = $conn->query($sql);
			
			$sql = "CREATE USER '$user'@'localhost' IDENTIFIED BY '$pw'";
			$result = $conn->query($sql);
			
			/*
			$sql = "GRANT ALL PRIVILEGES ON *.* TO $user@'localhost'";
			$result = $conn->query($sql);
			*/

			CloseCon($conn);
		?>
		<br>user created</br>
	</body>
</html>
