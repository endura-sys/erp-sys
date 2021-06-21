
<?php
	include '../../database.php';
	$conn = OpenCon();
	$id = $_POST["id"];
	
	$sql = "DELETE FROM users where id = '$id'";
    $result = $conn->query($sql);

    header("location: user-management");
	
	CloseCon($conn);
?>
