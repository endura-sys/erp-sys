<?
<<<<<<< Updated upstream
$conn = mysqli_connect("localhost", "root", "root", "sakedb");
=======
<<<<<<< Updated upstream
mysqli_connect("enduraerp.ml", "endurate_sakedb", "oIx6*\$nZ_do3", "endurate_sakedb");
=======

function getTodaySale($date) {

        include '../../database.php';
        $conn = OpenCon();

        $sql = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales";
        $result = $conn->query($sql);

        $product_list = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($date = $row["payment_method"]) {
                        switch($row){
                            case "alipay":
                        }
                }
                echo "<tr><td>" .$row["product_id"] ."</td><td>" .$row["name"] ."</td><td>" . "$" . $row["p1"] ."</td><td>" . "$" . $row["p2"] ."</td><td>" . "$" . $row["p3"]
                 ."</td><td>" .$row["location"] ."</td><td>" .$row["sake_brewer"] ."</td><td>" .$row["volume"] . "ML" ."</td><td>".$row["unit"] . "/ctn" ."</td>";
            }
        } else {
            echo "0 results";
        }
        echo $product_list[0][1];
        CloseCon($conn);



}


>>>>>>> Stashed changes
>>>>>>> Stashed changes

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
