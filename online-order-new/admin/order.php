<?php
include './func/fuc.php';	
include './func/yz.php';	
//查询数据
$datebase = new Datebase();
$sql = "SELECT * FROM order_record";
$res = $datebase -> querySql($sql,"./func/config.php");
$date = $datebase -> useDate($res);
$allorder = count($date);
$order = [];
$l = 0;
for($i=0;$i<$allorder;$i++){
	if ($date[$i]['succ']==0 OR $date[$i]['zjsu']==0){
		$l = array_push($order,$date[$i]);
	}
}
//var_dump($order);
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
  <div class="panel-heading" style="background-color: blueviolet; color: wheat;">订单管理</div>
 <br/>


 <?php
 $s = 0;
 	for($k=0;$k<$l;$k++){
 		if($date[$k]['succ']==0){
 			$s++;
 		echo '<div class="panel panel-primary ">';
		echo '<div class="panel-heading ">'.$order[$k]['num'].'号桌订单</div>';
		echo '<div class="panel-body">';
		echo '<p>订单号：'.$order[$k]['id'].'，用餐人数：'.$order[$k]['pnum'].'人</p></div><table class="table"><tr><th>名称</th><th>数量</th></tr>';
		$info = json_decode($order[$k]['info']);
		foreach($info as $name => $number){
			echo'<tr><td>'.$name.'</td><td>'.$number.'</td></tr>';
		}
		echo '  </table>';
		echo '<a href="./func/succ.php?tag=1&id='.$order[$k]['id'].'" class="btn btn-primary bb">完成</a><a href="./func/del.php?tag=1&id='.$order[$k]['id'].'" class="btn btn-danger bb">删除</a></div>';
		}
 		if($order[$k]['zj']){
 			$zj = $order[$k]['zj'];
			$datebase = new Datebase();
			$sql = "SELECT * FROM dc_zj WHERE id = '$zj'";
			$res1 = $datebase -> querySql($sql,"./func/config.php");
			$date1 = $datebase -> useDate($res1);
			$allorder1 = count($date1);
			$order1 = [];
			$l1 = 0;
			for($j=0;$j<$allorder1;$j++){
				if ($date1[$j]['succ']==0){
					$l1 = array_push($order1,$date1[$j]);
				}
			}
			for($j=0;$j<$l1;$j++){
				$s++;
				echo '<div class="panel panel-danger ">';
				echo '<div class="panel-heading ">'.$order[$k]['num'].'号桌订单(追加)</div>';
				echo '<div class="panel-body">';
				echo '<p>订单号：'.$order1[$j]['id'].'，用餐人数：'.$order[$k]['pnum'].'人</p></div><table class="table"><tr><th>名称</th><th>数量</th></tr>';
				$info1 = json_decode($order1[$j]['info']);
				foreach($info1 as $name1 => $number1){
					echo'<tr><td>'.$name1.'</td><td>'.$number1.'</td></tr>';
				}
				echo '  </table>';
				echo '<a href="./func/succ.php?tag=2&id='.$order1[$j]['id'].'" class="btn btn-primary bb">完成</a><a href="./func/del.php?tag=2&id='.$order1[$j]['id'].'" class="btn btn-danger bb">删除</a></div>';
		
			}
			
			
 		}
 	}
 	
 ?>
  <?php
 	if($s==0){
 		echo ' <h4>暂时没有订单哦</h4>';
 	}
 	
 	?>
 
</div>
</div>



	


</body>
</html>
