<?php

-/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL database name */
define( 'DB_NAME', 'sakedb' );
// "localhost", "root", "root", "sakedb"
function OpenCon()
{

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connect failed: %s\n" . $conn->error);

	return $conn;
}

function GetCon()
{
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if ($conn == false) {
		die("ERROR: Could not connect. "
			. mysqli_connect_error());
	}

	return $conn;
}

function CloseCon($conn)
{
	$conn->close();
}
