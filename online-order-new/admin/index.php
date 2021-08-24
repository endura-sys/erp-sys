<?php
	include './func/fuc.php';	
//查询数据
$datebase = new Datebase();
$getdate = new getDate();
$pag = $getdate -> getGet("pag");
$sql = "SELECT id, info, money, time FROM order_record";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
//var_dump($date);
$allorder = count($date);
if($allorder<100){
	$p = 1;
}else{
	$p = intval(floor($allorder/100)); 
	if($allorder%100){
		$p = $p+1;
	}
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
					 <a class="btn btn-primary btn-large" href="dp.php">店铺管理 »</a>
				 <a class="btn btn-primary btn-large" href="qrcode.php">二维码生成 »</a>
				</p>

			</div>
		</div>
	</div>


<!--
	数据统计面板
-->

<!-- <div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">数据统计</div>
  <div class="panel-body" style="text-align: center;">
    
    <div style="display: inline-block;position: relative;">
    <img src="img/money.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;margin: 2px">	
    <span style="position: absolute; top: 60px; left: 110px;font-size: 40px;color: white;">￥<?php echo $money; ?></span>
    <span style="position: absolute; top: 110px; left: 200px;font-size: 20px;color: white;">金额</span>
    </div>
    
    <div style="display: inline-block; position: relative;">
    <img src="img/ordern.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;">	
    <span style="position: absolute; top: 40px; left: 160px;font-size: 60px;color: white;"><?php echo $torder; ?></span>
    <span style="position: absolute; top: 110px; left: 180px;font-size: 20px;color: white;">今日订单</span>
    </div>
    
    <div style="display: inline-block;position: relative;">
    <img src="img/history.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;margin: 2px">	
    <span style="position: absolute; top: 60px; left: 110px;font-size: 40px;color: white;"><?php echo $allorder; ?></span>
    <span style="position: absolute; top: 110px; left: 200px;font-size: 20px;color: white;">总订单</span>
    </div>
    
    <div style="display: inline-block;position: relative;">
    <img src="img/order.jpg"/ style="width: 300px; height: 155px;border-radius: 10px;">
    <span style="position: absolute; top: 40px; left: 160px;font-size: 50px;color: white;"><?php echo $cd; ?></span>
    <span style="position: absolute; top: 110px; left: 180px;font-size: 20px;color: white;">菜单数量</span>
    </div>
    
  </div>
</div> -->

<div class="panel panel-default" style="margin: 30px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">分类管理</div> 
 <br/>

<table class="table">
	<?php
		$n = 100*$p+1;
		$i = ($p-1)*100+1;
		if($allorder<100){
			$n=$allorder+1;
		}
		for($i;$i<$n;$i++){
				$s =0;
			echo '<tr><th>id</th><th> </th><th>内容</th><th>价格</th><th> </th><th>时间</th><th>操作</th></tr>';
			echo '<tr><td>'.$date[$i-1]['id'].'</td><td>'.$date[$i-1]['num'].'</td><td>';
			$info = json_decode($date[$i-1]['info']);
			foreach($info as $name => $number){
				$s++;
				echo $s.'.'.$name.'&nbsp;&nbsp;&nbsp;'.$number.'份<br/>';
			}
			echo '</td><td>';
			echo $date[$i-1]['money'];
			echo '</td><td>'.$date[$i-1]['pnum'].'</td><td>'.$date[$i-1]['time'].'</td><td><a class="btn btn-danger" href="./func/del.php?tag=4&id='.$date[$i-1]['id'].'">删除</a></td></tr>';
		}
		
		?>

    	
  </table>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    	for($k=0;$k<$p;$k++){
    		echo '<li><a href="./history.php?act=4&pag='.$p.'">'.$p.'</a></li>';
    	}
    	?>
    
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<!--
	系统概况
-->

<div class="panel panel-default" style="margin: 10px;">
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">系统概况</div>
  <div class="panel-body">
  <table class="table">
    	<tr><th>项目</th><th>内容</th><th></th><th>项目</th><th>内容</th></tr>
    	<tr><td>系统版本：</td><td>点餐系统 V1.0.0</td><td></td><td>系统环境：</td><td>php+mysql</td></tr>
    	<tr><td>上线日期：</td><td>2019年3月1日</td><td></td><td>当前时间：</td><td><?php echo @date("Y-m-d H:i:s"); ?></td></tr>
    	<tr><td>权限：</td><td>管理员</td><td></td></tr>
  </table>
  </div>
</div>


</div>




	


</body>
</html>
