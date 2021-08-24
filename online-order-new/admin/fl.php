<?php
include './func/fuc.php';	
include './func/yz.php';	
//查询数据
$datebase = new Datebase();
$sql = "SELECT * FROM order_type";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$allorder = count($date);
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
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">分类管理</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">添加分类</div>
  <div class="panel-body">
    
<form action="./func/add.php?tag=1" method="post" class="container container-small">
    <div class="form-group">
        <lable>分类名：</lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <input class="btn btn-primary" type="submit" id="" name="" value="添加"/>
</form>

  </div>
</div>

 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">分类列表</div>
  <div class="panel-body">
    <table class="table">
    	<tr><th>id</th><th>分类</th><th>操作</th></tr>
    	<?php
    		for($i=0;$i<$allorder;$i++){
    			echo '<tr><td>';
				echo $date[$i]['id'];
				echo '</td><td>';
				echo $date[$i]['name'];
				echo '</td><td width="20%"><a class="btn btn-danger" href="./func/del.php?tag=3&id='.$date[$i]['id'].'">删除</a></td></tr>';
    		}
    		
    		?>
    	
  </table>
  </div>
</div>
  
 
</div>
</div>



	


</body>
</html>
