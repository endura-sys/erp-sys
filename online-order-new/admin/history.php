<?php
	include './func/fuc.php';	
//查询数据
$datebase = new Datebase();
$getdate = new getDate();
$pag = $getdate -> getGet("pag");
$sql = "SELECT * FROM order_record";
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
					每页最多显示100行数据，请通过翻页查看下一页！
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

<table class="table">
	<?php
		$n = 100*$p+1;
		$i = ($p-1)*100+1;
		if($allorder<100){
			$n=$allorder+1;
		}
		for($i;$i<$n;$i++){
				$s =0;
			echo '<tr><th>id</th><th>桌号</th><th>内容</th><th>价格</th><th>人数</th><th>时间</th><th>操作</th></tr>';
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
 
</div>
</div>



	


</body>
</html>
