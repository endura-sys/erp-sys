<?
$conn = mysqli_connect("localhost", "root", "root", "sakedb");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$no =  $_REQUEST['no'];
$status =  $_REQUEST['status'];
$p1 = $_REQUEST['p1'];
$p2 = $_REQUEST['p2'];
$p3 = $_REQUEST['p3'];
$stock = $_REQUEST['stock'];
$location = $_REQUEST['location'];
$sake_brewer = $_REQUEST['sake_brewer'];
$name = $_REQUEST['name'];
$volume = $_REQUEST['volume'];
$unit = $_REQUEST['unit'];

// Performing insert query execution
$sql = "INSERT INTO product  VALUES ('$no'
,'$status','$p1','$p2','$p3','$stock','$location','$sake_brewer',
'$name','$volume','$unit')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Data stored in a database successfully."
        . " Please browse your localhost"
        . " to view the updated data</h3>";

    echo nl2br("No : $no\n"
        . "Status : $status\nP1 : $p1\nP2 : $p2\nP3 : $p3\nStatus : $status\nLocation : $location\nSake brewer : $sake_brewer\nName : $name\nVolume : $volume\nUnit : $unit\n");
} else {
    // echo "ERROR : Invalid input $sql. "
    // . mysqli_error($conn);
    echo "ERROR : Invalid input. "
        . mysqli_error($conn);
}
mysqli_close($conn);
