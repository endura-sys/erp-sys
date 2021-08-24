<?php
include './fuc.php';
	//查询数据
$getdate = new getDate();
$datebase = new Datebase();
$id = $getdate -> getGet("id");
$tag = $getdate -> getGet("tag");
$sql1 = "select *from order_record where id = '$id'";
$sql2 = "select *from order_record where zj = '$id'";
if($tag==1){
	$res = $datebase -> querySql($sql1,"./config.php");
}else{
	$res = $datebase -> querySql($sql2,"./config.php");
}


$date = $res -> fetch_row();
$info = json_decode($date[2]);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>小票打印</title>
	</head>
	<body style="height: 480px;width: 200px;">
		<h1>桌号：<?php echo $date[1]; ?></h1>
		<?php
			foreach($info as $name => $number){
				echo '<h3>'.$name.'&nbsp;&nbsp;&nbsp;'.$number.'</h3>';
			}
			?>
		
		<h4>价格：<?php echo $date[3]; ?></h4>
	</body>
</html>

<script type="text/javascript">
	window.print();
window.close();	
</script>