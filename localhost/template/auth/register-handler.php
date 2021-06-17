<!DOCTYPE html>
<html lang="en">
	<body>
		<?php 
			
			if (isset($_POST["submitbtn"])) {
				include '../../database.php';
				$conn = OpenCon();
				
				$fullname = $_POST["fullname"];
				$position = $_POST["position"];
				$email = $_POST["email"];
				$phone = $_POST["phone"];
				$user = $_POST["username"];
				$pw = $_POST["password"];
				$pw2 = $_POST["confirmpassword"];
				$errors = array();
				
				if (empty($fullname)) { array_push($errors, "Full Name is required."); }
				if (empty($position)) { array_push($errors, "Job Position is required."); }
				if (empty($email)) { array_push($errors, "Email is required."); }
				if (empty($phone)) { array_push($errors, "Phone is required."); }
				if (empty($user)) { array_push($errors, "Username is required."); }
				if (empty($pw)) { array_push($errors, "Password is required."); }
				if (empty($pw2)) { array_push($errors, "Please enter password again."); }
				else if ($pw != $pw2) { array_push($errors, "Passwords do not match."); }

				$sql = "SELECT * from users where username = '$user'";
				$result = $conn->query($sql);
				$num = mysqli_num_rows($result);
				
				if ($num > 0) {
					array_push($errors, "Username already exists. Please create a new username.");
				}
				
				if (count($errors) == 0) {
				
					$sql = "INSERT INTO users (full_name, position, email, phone, username, password) VALUES('$fullname', '$position', '$email', '$phone', '$user', '$pw')";
					$result = $conn->query($sql);
					
					$sql = "CREATE USER '$user'@'localhost' IDENTIFIED BY '$pw'";
					$result = $conn->query($sql);
					
					/*
					$sql = "GRANT ALL PRIVILEGES ON *.* TO $user@'localhost'";
					$result = $conn->query($sql);
					*/
					
					header("location: dashboard");
				}
				
				CloseCon($conn);
			}
		?>
	</body>
</html>
