<?php
header("Content-type:text/html;charset=utf-8");
include './fuc.php';
//查询数据
$getdate = new getDate();
$datebase = new Datebase();
$name = $getdate -> getPost("name");
$info = $getdate -> getPost("info");
$act = $getdate -> getGet("act");
$pic=0;
if($act==1){
	// 允许上传的图片后缀
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     // 获取文件后缀名
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
	&& in_array($extension, $allowedExts))
	{
	    if ($_FILES["file"]["error"] > 0)
	    {
	        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
			$pic=1;
	    }
	    else
	    {
	        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
	        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
	        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
	        
	        // 判断当期目录下的 upload 目录是否存在该文件
	        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	        {
	            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
	        }
	        else
	        {
	            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
	            $filename = "dpimg_".time().rand(1000,9999).".jpg";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $filename);
				$url = "upload/".$filename;
	            echo "文件存储在: " . "upload/" . $filename;
	        }
	    }
	}
	else
	{
	    echo "非法的文件格式";
		$pic=1;
	}
	if($name==""||$info==""||$pic){
		echo "<br/>添加失败！";
		die();
	}
	
	$sql = "update order_dp set name = '$name' , pic = '$url' , info = '$info' where id = '1'";
	$datebase -> querySql($sql,"./config.php");
	echo "<script>window.location.href='../dp.php?act=1'</script>";
}else if($act==2){
	// 允许上传的图片后缀
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     // 获取文件后缀名
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
	&& in_array($extension, $allowedExts))
	{
	    if ($_FILES["file"]["error"] > 0)
	    {
	        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
			$pic=1;
	    }
	    else
	    {
	        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
	        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
	        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	        echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
	        
	        // 判断当期目录下的 upload 目录是否存在该文件
	        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	        {
	            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
	        }
	        else
	        {
	            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
	            $filename = "qrcode_".time().rand(1000,9999).".jpg";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $filename);
				$url = "upload/".$filename;
	            echo "文件存储在: " . "upload/" . $filename;
	        }
	    }
	}
	else
	{
	    echo "非法的文件格式";
		$pic=1;
	}
	
	$sql = "update order_qrcode set url = '$url' where id = 1";
	$datebase -> querySql($sql,"./config.php");
	echo "<script>window.location.href='../dp.php?act=1'</script>";
}elseif($act == 3){
	$pass = md5($getdate -> getPost("newpass"));
	$id = $getdate -> getGet("id");
	$sql = "update account set pass = '$pass' where id = '$id'";
	$res = $datebase -> querySql($sql,"./config.php");
	if($res){
		echo "<script>window.location.href='../user.php?act=1'</script>";
	}else{
		echo "<script>window.location.href='../user.php?act=2'</script>";
	}
	
}
