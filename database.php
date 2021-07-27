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
<<<<<<< Updated upstream
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$db = "sakedb";
=======
<<<<<<< Updated upstream
		$dbhost = "enduraerp.ml";
		$dbuser = "endurate_sakedb";
		$dbpass = "oIx6*\$nZ_do3";
		$db = "endurate_sakedb";
>>>>>>> Stashed changes
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
=======
		
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Connect failed: %s\n". $conn -> error);
>>>>>>> Stashed changes

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
