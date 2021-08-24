<?php
header("Content-type:text/html;charset=utf-8");
include './fuc.php';
//查询数据
$getdate = new getDate();
$datebase = new Datebase();
$tag = $getdate -> getGet("tag");
$name = $getdate -> getPost("name");



if($tag==1){
	$sql = "ALTER TABLE `order_type` AUTO_INCREMENT =1";
	$sql1 = "insert into order_type (name) value ('$name')";
	$datebase -> querySql($sql,"./config.php");
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../fl.php'</script>";
}else if($tag==2){
	$sql0 = "ALTER TABLE `wine_list` AUTO_INCREMENT =1";
	

	$info = $getdate -> getPost("info");
	$money = $getdate -> getPost("money");
	$push = $getdate -> getPost("push");
	$fl = $getdate -> getPost("fl");
	$pic=0;
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
	            $filename = "img_".time().rand(1000,9999).".jpg";
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
	if($name==""||$info==""||$money==""||$push==""||$fl==""||$pic){
		echo "<br/>添加失败！";
		die();
	}
		$sql2 = "insert into wine_list (fl,name,money,pic,info,push) value ('$fl','$name','$money','$url','$info','$push')";
		$datebase -> querySql($sql0,"./config.php");
		$datebase -> querySql($sql2,"./config.php");
		echo "<script>window.location.href='../cd.php'</script>";
}elseif($tag == 3){
	$user = $getdate -> getPost("user");
	//echo $user;
	//die ();
	$pass = md5($getdate -> getPost("pass"));
	$sql = "ALTER TABLE `order_type` AUTO_INCREMENT =1";
	$sql1 = "insert into account (user,pass) value ('$user','$pass')";
	$datebase -> querySql($sql,"./config.php");
	$datebase -> querySql($sql1,"./config.php");
	echo "<script>window.location.href='../user.php'</script>";
}
	
	die();
?>