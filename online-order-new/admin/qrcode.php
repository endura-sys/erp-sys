<?php
include './func/fuc.php';	
include './func/yz.php';	
$s="";
$u = "";
	$getdate = new getDate();
	$act = $getdate -> getGet("act");
//echo $act;
if($act){
	$url = $getdate -> getPost("url");
	$num = $getdate -> getPost("num");
	$s = $url."/index.php?zh=".$num;
	$u = $url;	
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
				<p>
					 <a class="btn btn-primary btn-large" href="index.php"><<返回</a>
				</p>

			</div>
		</div>
	</div>


<!--
	数据统计面板
-->

<div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">二维码生成</div>
  <div class="panel-body" style="text-align: center;">
    <form action="qrcode.php?act=1" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">域名</label>
    <input name="url" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $u; ?>" placeholder="http://www.baiu.com">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">桌号</label>
    <input name="num" type="number" class="form-control" id="exampleInputPassword1" placeholder="1">
  </div>
  
  
  <button type="submit" class="btn btn-default">生成</button>
</form>
    <iframe width="480px" height="680px" src="https://cli.im/api/qrcode/code?text=<?php echo $s; ?>&mhid=4RbPDg3qyZ4hMHcrItNTOqM" width="" height=""></iframe>

</div>
</div>



	


</body>
</html>
