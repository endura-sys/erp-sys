<?php
include './fuc.php';
//查询数据
$getdate = new getDate();
$datebase = new Datebase();
$tag = $getdate -> getGet("tag");
$id = $getdate -> getGet("id");
$sql1 = "update order_record set succ = '1' where id = '$id'";
$sql2 = "update dc_zj set succ = '1' where id = '$id'";
$sql3 = "update order_record set zjsu = '1' where id = '$id'";
if($tag==1){
	$res = $datebase -> querySql($sql1,"./config.php");
}else{
	$res = $datebase -> querySql($sql2,"./config.php");
	$res = $datebase -> querySql($sql3,"./config.php");
}
echo "<script>window.location.href='../order.php'</script>";
die();
?>