<?php

include 'database.php';

$conn = OpenCon();

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
 }
   echo "Connected successfully";

	
	$sql = "SELECT * FROM wine_list";
	$result = $conn->query($sql);

	$product_list = array();

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	array_push($product_list, array( $row["p1"] ));
	    // echo $product_list[0][2];
	    // print_r($product_list);
	  }
	} else {
	  echo "0 results";
	}

    echo json_encode($product_list);

CloseCon($conn);

?>