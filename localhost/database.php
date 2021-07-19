<?php

// define( 'DB_NAME', 'db' );

// /** MySQL database username */
// define( 'DB_USER', 'root' );

// /** MySQL database password */
// define( 'DB_PASSWORD', 'root' );

// /** MySQL hostname */
// define( 'DB_HOST', 'localhost' );

// /** Database Charset to use in creating database tables. */
// define( 'DB_CHARSET', 'utf8' );

// /** The Database Collate type. Don't change this if in doubt. */
// define( 'DB_COLLATE', '' );


	function OpenCon()
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$db = "sakedb";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

		return $conn;
	}

	function CloseCon($conn)
	{
		$conn -> close();
	}

?>
