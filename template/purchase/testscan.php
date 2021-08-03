
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
<input type="submit" value="submit" name="submit"/>  
<input type="reset" value="reset" name="button"/> 
</form>
<!-- <form method="post" name="yundanForm" οnsubmit='lost()'> 
<input name="quantity" type="text" id="quantity"/>
<input type="submit" value="submit_quantity" name="submit"/> 
</form>  -->
<?php 


@$danhao = $_POST['danhao'];  
// @$quantity = $_POST['danhao'];
 


$today = date("Y-m-d");  

@$sqlselect = "select * from `testphp`.`yundan` where num='$danhao'";
@$sqlinsert = "INSERT INTO `testphp`.`yundan`(num) VALUES('$danhao')";
$selecttoday = "select `num` from `yundan` where `time` LIKE '%$today%'";
$counttoday = "select count(*) from `testphp`.`yundan` where `time` LIKE '%$today%'"; 
$conn=mysqli_connect("localhost","root","root", "testphp");
 
$my_db = mysqli_select_db($testphp,$conn);   
$selectnum = mysqli_query($conn,$sqlselect); 
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
//   $sql = "SELECT * FROM `testphp`.`yundan`";
//   $result = mysqli_query($conn, $sql);
  
//   if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//       echo "num: " . $row["num"]. "date: " . $row["date"]. "<br>";
//     }
//   } else {
//     echo "0 results";
//   }
  
//   mysqli_close($conn);
 


if(!empty($danhao)) { 
    if (mysqli_num_rows($selectnum)) {  
        echo "<br>\n";
        echo "<br>\n";  
        echo "<br>\n";
        echo "Items：$danhao has already confirmed";
        
} else {
        $insertnum = mysqli_query($conn,$sqlinsert);
        echo "<br>\n";
        echo "<br>\n";
        echo "<br>\n";
        echo "Items：$danhao is confirmed successfully<br>\n";
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