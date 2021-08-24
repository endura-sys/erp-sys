<?php
	header("Content-Type: text/html;charset=utf-8");
	include './admin/func/fuc.php';
	$getdate = new getDate();
	$zh = $getdate -> getGet("zh");
	$num = $getdate -> getGet("num");
	$id = $getdate -> getGet("id");
	$money = $getdate -> getGet("money");
	$data = $getdate -> getPost('data');
	//var_dump($data);
	//查询数据
	$time = date("Y-m-d");
	$zj = time().rand(1000, 9999).rand(10, 99).rand(100, 999);
	$datebase = new Datebase();
	if($id){
		//echo "2";
		$sql = "update order_record set zj = '$zj' , zjsu = 0 where id = '$id'";
		$sql1 = "insert into dc_zj (id,info,money,time) value ('$zj','$data',$money,'$time')";
		$res = $datebase -> querySql($sql,"./admin/func/config.php");
		$res1 = $datebase -> querySql($sql1,"./admin/func/config.php");
		if($res1){
			//echo "1";
			echo "<script>window.location.href='./succ.php?id=".$zj."'</script>";
			die();
		}else{
			echo "<script>window.location.href='./fail.html'</script>";
			die();
	}
	}
	//echo "3";
	$id = time().rand(1000, 9999).rand(10, 99).rand(100, 999);
	$sql = "insert into order_record (id,num,info,money,pnum,time) value ('$id','$zh','$data',$money,'$num','$time')";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	if($res){
		echo "<script>window.location.href='./succeed.php?id=".$id."'</script>";
	}else{
		echo "<script>window.location.href='./fail.html'</script>";
	}
	die();
?>