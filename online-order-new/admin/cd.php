<?php
include './func/fuc.php';
include './func/yz.php';		
//查询数据
$datebase = new Datebase();
$sql = "SELECT id, fl, name, money, pic, info, push FROM wine_list";
$sql1 = "SELECT * FROM order_type";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$res1 = $datebase -> querySql($sql1,"./func/config.php");
$fl = $datebase -> useDate($res1);
//var_dump($date);
$allorder = count($date);
$fln = count($fl);
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
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">菜单管理</div> 
 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">添加菜单</div>
  <div class="panel-body">
    
<form id="cd" enctype="multipart/form-data" action="./func/add.php?tag=2" method="post"  class="container container-small">
    <div class="form-group">
        <lable>菜名：</lable>
        <input name="name" id="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>简介：</lable>
        <input name="info" id="info" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>价格（元）：</lable>
        <input name="money" id="money" type="text" class="form-control">
    </div>
    <div class="form-group">
        <lable>图片：</lable>
        <input name="file" type="file" formenctype="multipart/form-data" class="form-control">
    <lable>仅允许上传小于100k的jpg、png图片</lable>
    </div>
    <lable>是否推荐：</lable>
   <select name="push" form="cd" id="push" class="form-control">
  <option value="0">否</option>
  <option value="1">是</option>
</select>
    <lable>分类：</lable>
   <select name="fl" id="fl" form="cd" class="form-control">
  <?php
  	for($u=0;$u<$fln;$u++){
  		echo '<option value="'.$fl[$u]['id'].'">'.$fl[$u]['name'].'</option>';
  	}
  	
  	?>

</select>
<br/>
    <input class="btn btn-primary" type="submit" id="" name="" value="添加"/>
</form>

  </div>
</div>

 <br/>

<div class="panel panel-danger">
  <div class="panel-heading">分类列表</div>
  <div class="panel-body">
    <table class="table">
    	<tr><th>id</th><th>分类</th><th>名称</th><th>图片</th><th>价格（元）</th><th>简介</th><th>推荐</th><th>操作</th></tr>
    	
    	<?php
    		for($i=0;$i<$allorder;$i++){
    			if($date[$i]['push']==1){
    				$push = "是";
    			}else{
    				$push = "否";
    			}
    			echo '<tr><td>'.$date[$i]['id'].'</td><td>'.$fl[$date[$i]['fl']-1]['name'].'</td><td>'.$date[$i]['name'].'</td><td>';
				echo '<img width="60px" height="60px" src="../'.$date[$i]['pic'].'"'.$date[$i]['pic'].'"/>';
				echo '</td><td>'.$date[$i]['money'].'</td>';
				echo '</td><td>'.$date[$i]['info'].'</td><td>'.$push.'</td><td><a class="btn btn-danger" href="./func/del.php?tag=5&id='.$date[$i]['id'].'">删除</a></td></tr>';
    		}
    		
    	?>
    	
    	
    		
    	
  </table>
  </div>
</div>
  
 
</div>
</div>



	


</body>
</html>
