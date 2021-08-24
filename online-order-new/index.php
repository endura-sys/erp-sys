<?php
	include './admin/func/fuc.php';
	$getdate = new getDate();
	$zh = $getdate -> getGet("zh");
	$datebase = new Datebase();
	$sql = "SELECT * FROM order_record where num='$zh' and succ = 0";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	$date = $datebase -> useDate($res);
	if($res->num_rows){
	if($date[0]['time']==date("Y-m-d")){
		$id = $date[0]['id'];
		echo "<script>window.location.href='./succeed.php?act=1&id=".$id."'</script>";
	}}
	?>

<!DOCTYPE html>
<script type="text/javascript">
	function wx() {
			var ua = navigator.userAgent.toLowerCase();
var isWeixin = ua.indexOf('micromessenger') != -1;
if (isWeixin) {
    return true;
}else{
    return false;
}
	}
var a = wx();

if (!a){
	//window.location.href = "erro.html";
}

</script>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
    </script>
</head>
<style type="text/css">
	.cer{
		margin: auto;
		margin-top: 60px;
		height: 200px;
		width: 200px;
		border:1px solid #DD524D;
		border-radius: 100px;
		text-align: center;
		line-height: 200px;
	}
	.plus{
		margin-left: 40px;
		font-size: 40px;
		color: #DD524D;
	}
	.minus{
		margin-right: 40px;
		font-size: 40px;
		color: #DD524D;
	}
	#num{
		text-align: center;
	}
	.tj{
		width: 250px;
		margin-top: 40px;
		background-color: #DD524D;
		border: #DD524D;
	}
	.bb{
		text-align: center;
	}
</style>
<body>
	<div class="mui-content">
	    <header class="mui-bar mui-bar-nav" style="background-color: #DD524D;">
	        <h1 class="mui-title" style="color: white;">选择用餐人数</h1>
	    </header>
	    <div class="box">
	    	<div class="cer">
	    	<span id="num1" style="font-size: 40px;">
	    		0
	    	</span>人
	    </div>
	    </div>
	    <div id="num">
	    	<div onclick="min()" class="mui-icon mui-icon-minus minus"></div>
	    	<div onclick="add()" class="mui-icon mui-icon-plus plus"></div>
	    </div>
	    <div class="bb">
	    	 <button onclick="tj()" type="button" class="mui-btn mui-btn-primary tj">提交</button>
	    
	    </div>
	   
	</div>
</body>

<script type="text/javascript">
	var num = 0;
	function add (){
		num = num+1;
		var o = document.getElementById("num1");
		if (num > 99){
			num = 0;
		}
		o.innerHTML = num;
	}
		function min (){
		num = num-1;
		var o = document.getElementById("num1");
		if (num < 0){
			num = 99;
		}
		o.innerHTML = num;
	}
		function tj(){
		var o = document.getElementById("num1");
		window.location.href="order.php?zh=<?php echo $zh; ?>&num="+o.innerHTML;
		}
</script>