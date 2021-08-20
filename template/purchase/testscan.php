
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
<title>Items ID</title> 
<style type="text/css">
    body {
        text-align:center;
    }
</style>

</head> 
<body>
<form method="post" name="yundanForm" οnsubmit='lost()'> 
<input name="danhao" type="text" id="danhao"/>
<input name="quantity" type="text" id="quantity"/>
<input type="submit" value="submit" name="submit"/>  
<input type="reset" value="reset" name="button"/>

<?php 


@$danhao = $_POST['danhao'];  
@$quantity = $_POST['quantity'];
 


$today = date("Y-m-d");  

@$sqlselect = "select * from `testphp`.`yundan` where num='$danhao'";
@$sqlinsert = "INSERT INTO `testphp`.`yundan`(num) VALUES('$danhao')";
$selecttoday = "select `num` from `yundan` where `time` LIKE '%$today%'";
$counttoday = "select count(*) from `testphp`.`yundan` where `time` LIKE '%$today%'"; 

require_once('../../database.php');
$conn = OpenCon();
 
$my_db = mysqli_select_db($testphp,$conn);   
$selectnum = mysqli_query($conn,$sqlselect); 
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



if(!empty($danhao)) { 
    if (mysqli_num_rows($selectnum)) {  
        echo "<br>\n";
        echo "<br>\n";  
        echo "<br>\n";
        echo "Items：$danhao has already confirmed\n";
        $sql_oldq = "SELECT `quantity` from `testphp`.`yundan` where num = '$danhao'";
        $result_oldq = $conn->query($sql_oldq);
        $row_oldq = $result_oldq->fetch_assoc();
        $oldq = $row_oldq["quantity"];
        $quan = $oldq + $quantity;
        $sql = "UPDATE yundan SET quantity = '$quan' WHERE num = '$danhao'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully\n";
            echo "<br>The order is: $danhao\n";
            echo "<br>The added number of Items is: $quantity\n";
          } else {
            echo "Error updating record1: " . mysqli_error($conn);
          }
        
} else {
        $insertnum = mysqli_query($conn,$sqlinsert);
        echo "<br>\n";
        echo "<br>\n";
        echo "<br>\n";
        echo "<br>Items：$danhao is confirmed successfully<br>\n";
        $sql = "UPDATE yundan SET quantity = '$quantity' WHERE num = '$danhao'";
        if (mysqli_query($conn, $sql)) {
            echo "<br>The order is :$danhao\n";
            echo "<br>The total number of Items is$quantity\n";
            echo "Record updated successfully";
          } else {
            echo "Error updating record2: " . mysqli_error($conn);
          }
        }
}
// print_r($_POST)
 
$totaltotal = mysqli_fetch_array(mysqli_query($conn,$counttoday));
$yundannum = mysqli_query($conn,$selecttoday);
 
echo "<br>\n";
echo "<br>\n";
echo "<br>\n"; 
echo "Total Today: $totaltotal[0]<br>\n";
 
// while($echonum = mysqli_fetch_array($yundannum)){  
//     echo $echonum['num'];
//     echo "<br>\n";
// }
mysqli_close($conn); 
?>
<script type="text/javascript"> 
document.getElementById ('danhao').focus(); 
function lost(){
document.getElementById ('danhao').blur();  
}
</script>
</body> 
</html>