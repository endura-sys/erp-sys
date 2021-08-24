<?php
	include './func/yz.php';	
		include './func/fuc.php';
	$getdate = new getDate();
	$act = $getdate -> getGet("act");
	$a="";
	if ($act==1){
		$a = "修改成功！";
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
<a class="btn btn-primary btn-large" href="index.php"><<返回</a>
			</div>
		</div>
	</div>


<!--
	数据统计面板
-->

<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">店铺管理</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">基本信息</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=1" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
    <div class="form-group">
        <lable>店名：</lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>简介：</lable>
        <input name="info" id="info" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>图片：</lable>
        <input name="file" id="file" formenctype="multipart/form-data" type="file" class="form-control">
    <lable>仅允许上传小于100k的jpg、png图片</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="修改"/>
    <h5 style="color: red;"><?php echo $a;?></h5>
</form>

  </div>
</div>

 <br/>
 
 <div class="panel panel-danger">
  <div class="panel-heading">微信二维码</div>
  <div class="panel-body">
    
<form action="./func/edit.php?act=2" method="post" enctype="multipart/form-data" id="dp" class="container container-small">
  
    <div class="form-group">
        <lable>图片：</lable>
        <input name="file" id="file" formenctype="multipart/form-data" type="file" class="form-control">
    <lable>仅允许上传小于100k的正方形二维码</lable>
    </div>

<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="修改"/>
    <h5 style="color: red;"><?php echo $a;?></h5>
</form>

  </div>
</div>


 
</div>
</div>



	


</body>
</html>
