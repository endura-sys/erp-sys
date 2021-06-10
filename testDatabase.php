<?php

include 'database.php';

$conn = OpenCon();

	
	$sql = "SELECT no, status, p1, p2, p3, stock, location, sake_brewer, name, volume, unit FROM data";
	$result = $conn->query($sql);

	$product_list = array();

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
	    // echo $product_list[0][2];
	    // print_r($product_list);
	  }
	} else {
	  echo "0 results";
	}

    echo $product_list[0][1];

CloseCon($conn);

?>