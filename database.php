<?php


	function OpenCon()
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$db = "sakedb";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

		return $conn;
	}

	function GetCon()
	{
		$conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                                        if ($conn == false) {
                                                            die("ERROR: Could not connect. "
                                                                . mysqli_connect_error());
                                                        }

		return $conn;
	}

	function CloseCon($conn)
	{
		$conn -> close();
	}
?>
