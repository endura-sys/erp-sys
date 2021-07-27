<?php


/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** MySQL database name */
define( 'DB_NAME', 'sakedb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

	function OpenCon()
	{
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connect failed: %s\n". $conn -> error);

		return $conn;
	}

	function GetCon($conn)
	{
		mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	}

	function CloseCon($conn)
	{
		$conn -> close();
	}
?>
