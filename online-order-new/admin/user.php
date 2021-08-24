<?php
	include './func/yz.php';	
		include './func/fuc.php';
	$getdate = new getDate();
	$act = $getdate -> getGet("act");
	$datebase = new Datebase();
	$sql = "SELECT * FROM account";
	$res = $datebase -> querySql($sql,"./func/config.php");
	$date = $datebase -> useDate($res);
	//var_dump($date);
	if($act == 1){
		$a = "修改成功！";
	}elseif($act == 5||$act == 0){
		$a = "";
	}
	else{
		$a = "修改失败！";
	}
	?>
<!DOCTYPE html>
<html>
<head>
<!--
	引入bootstarp相关文件以及jq文件
-->
  <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <script src="//cdn.staticfile.org/jquery/1.12.4/jquery.min.js"></script>
 	<script src="c" type="text/javascript" charset="utf-8"></script>
  <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
	<meta charset="utf-8"/>
	<!--
    网站标题
    -->
	<title>后台首页</title>
</head>
<style type="text/css">
	.bb{
		margin-left: 20px;
		margin-bottom: 10px;
	}
</style>
<!--
	网页正文
-->
<body>
	<!--php引入网站导航头部文件-->
	<?php
		include "header.php";
		?>

<!--
	欢迎面板
-->
<div class="container-fluid">
	<div class="row-fluid" style="background-color: darkslateblue; color: #FFFFA0; padding: 10px;">
		<div class="span12">
			<div class="hero-unit">
				<h1>
					您好!
				</h1>
				<p>
					欢迎使用点餐系统管理后台，您可以通过此后台管理和查看数据！
				</p>
			</div>
		</div>
	</div>


<!--
	数据统计面板
-->

<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">用户管理</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">添加用户</div>
  <div class="panel-body">
    
<form action="./func/add.php?tag=3" method="post" class="container container-small">
    <div class="form-group">
        <lable>用户名：</lable>
        <input name="user" id="user" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>密码：</lable>
        <input name="pass" id="pass" type="text" class="form-control">
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="添加用户"/>
</form>

  </div>
</div>

 <br/>
 
 <div class="panel panel-danger">
  <div class="panel-heading">修改密码</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=3&id=<?php echo $_COOKIE['id']; ?>" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
  
    <div class="form-group">
        <lable>输入新密码：</lable>
        <input name="newpass" id="newpass" type="text" class="form-control">
    <lable>请直接输入新密码！</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="修改"/>
    <h5><?php echo $a; ?></h5>
</form>

  </div>
</div>

 <div class="panel panel-danger">
  <div class="panel-heading">用户列表</div>
  <div class="panel-body">
    
<table class="table">
	<?php

			echo '<tr><th>id</th><th>u账号</th><th>密码</th><th>操作</th></tr>';
			foreach ($date as $v){
				echo '<tr><td>'.$v['id'].'</td><td>'.$v['user'].'</td><td>'.$v['pass'].'</td><td><a href="./func/del.php?tag=6&id='.$v['id'].'">删除</a></td></tr>';
			}
			
		?>

    	
  </table>

  </div>
</div>
 
</div>
</div>



	


</body>
</html>
