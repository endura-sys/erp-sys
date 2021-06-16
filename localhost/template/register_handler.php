<!DOCTYPE html>
<html lang="en">
	<body>
		<?php 
			$user = $_POST["username"];
			$pw = $_POST["password"];
			include '../database.php';
			$conn = OpenCon();
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
