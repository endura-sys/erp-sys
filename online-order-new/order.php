<?php require_once('helloword.php'); ?>

<?php
header("Content-Type: text/html;charset=utf-8");
include './admin/func/fuc.php';
$getdate = new getDate();
$zh = $getdate->getGet("zh");
$num = $getdate->getGet("num");
$id = $getdate->getGet("id");
$money = $getdate->getGet("money");
$data = $getdate->getPost('data');
if (!$zh && !$num) {
	//die("非正常打开！");


}
//查询数据
$datebase = new Datebase();
$sql = "SELECT id, fl, name, money, pic, info, push FROM wine_list";
$sql2 = "SELECT * FROM order_type";
$sql3 = "SELECT * FROM order_dp where id ='1'";
$menures = $datebase->querySql($sql, "./admin/func/config.php");
$menuDate = $datebase->useDate($menures);
$flres = $datebase->querySql($sql2, "./admin/func/config.php");
$fldate = $datebase->useDate($flres);
$dpres = $datebase->querySql($sql3, "./admin/func/config.php");
$dpdate = $dpres->fetch_row();
//var_dump($date);
$menuNumber = count($menuDate);
$flnum = count($fldate);

$push = [];
for ($i = 0; $i < $menuNumber; $i++) {
	if ($menuDate[$i]['push'] == 1) {
		$l = array_push($push, $menuDate[$i]);
	}
}



?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>點餐</title>
	<script src="js/mui.min.js"></script>
	<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
	<link href="css/mui.min.css" rel="stylesheet" />
	<script type="text/javascript" charset="utf-8">
		mui.init();
	</script>

	<script src="../erp/template/assets/vendors/jquery/jquery.min.js"></script>
	<script src="../erp/template/assets/js/moment.js"></script>
	<link rel="stylesheet" href="../erp/template/assets/css/bootstrap-datetimepicker.css">
	<link rek="stylesheet" href="../erp/template/assets/css/bootstrap-datetimepicker.min.css">
	<script src="../template/general/getData/globalData.js"></script>

</head>
<style type="text/css">
	::-webkit-scrollbar {
		display: none;
	}

	.imgbox {
		text-align: center;
	}

	.textbox {
		text-align: center;
	}

	.popup .content {
		position: absolute;
		top: 550%;
		left: 50%;
		bottom: 100%;
		transform: translate(-50%, -50%) scale(0);
		background: #fff;
		width: 75%;
		max-width: 10000px;
		height: 800%;
		z-index: 2;
		text-align: center;
		padding: 20px;
		box-sizing: border-box;
		font-family: "Open Sans", sans-serif;
		overflow-y: scroll;
	}

	.popup .close-btn {
		cursor: pointer;
		position: absolute;
		right: 20px;
		top: 20px;
		width: 30px;
		height: 30px;
		background: #222;
		color: #fff;
		font-size: 25px;
		font-weight: 600;
		line-height: 30px;
		text-align: center;
		border-radius: 50%;
	}

	.popup.active .overlay {
		display: block;
	}

	.popup.active .content {
		transition: TotalPricePerOrder 300ms ease-in-out;
		transform: translate(-50%, -50%) scale(1);
	}

	.infobox {
		text-align: center;
		margin-top: 10px;
	}

	.push {
		padding-top: 10px;
		padding-left: 15px;
	}

	.slide-box {
		margin-top: 10px;
		display: -webkit-box;
		overflow-x: overlay;
		-webkit-overflow-scrolling: touch;
	}

	.slide-item {
		width: 160px;
		height: 200px;
		margin-right: 30px;

	}

	.wimg {
		height: 120px;
	}

	.wtext {
		color: #000000;


		font-weight: 800;
		margin-top: 5px;
	}

	#money {
		color: red;
		font-size: 18px;
		margin-left: 0px;
	}

	.plus {
		color: #FAFAFA;
		background-color: #e81878;
		float: right;
		border-radius: 12px;
		margin-right: 25px;
	}

	.minus {
		color: #FAFAFA;
		background-color: #e81878;
		float: left;
		border-radius: 12px;
		margin-left: 25px;
	}

	.plus1 {
		color: #FAFAFA;
		background-color: #e81878;
		float: right;
		border-radius: 12px;
		margin-left: 10px;
		margin-top: 4px;
	}

	.minus1 {
		color: #FAFAFA;
		background-color: #e81878;
		float: right;
		border-radius: 12px;
		margin-right: 10px;
		margin-top: 4px;
	}

	.wimg2 {

		text-align: center;
	}

	.iinfo {
		display: inline;
		text-align: center;

	}

	.main {
		display: flex;
		flex-flow: row;
	}

	.left {
		width: 120px;
		height: 100%;
		background-color: #DDDDDD;
	}

	.right {
		flex: auto;
		width: 100%;
		height: 400px;
		margin-left: 20px;
		overflow-x: hidden;
		overflow-y: auto;
		-webkit-overflow-scrolling: touch;
	}

	.itext2 {
		font-size: 12px;
	}

	.pm {
		display: inline;
	}
</style>

<!doctype html>
<html lang="en">

<head>




	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/TotalPricePerOrder.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="erp/template/assets/css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>





<body>

	<div class="mui-content">
		<header class="mui-bar mui-bar-nav" style="background-color: #332;">
			<h1 class="mui-title" style="color: #C29E00;">點餐</h1>
			<button class="bi bi-cart" style="float:right" onclick="togglePopup()"></button>
			<div class="mui-tab-item mui-active" hr='main.html'>
				<div class="popup" id="popup-1">
					<div class="overlay"></div>
					<div class="content">
						<div class="close-btn" onclick="togglePopup()">×</div>
						<div class="mui-tab-item mui-active" hr='main.html'>
							<span id="ProductName(ShoppingCart)"></span>

						</div>
					</div>
				</div>
			</div>
		</header>

		<div style="height: 60px;"></div>
		<div class="topbox">

			<div class="textbox">
				<h3 style="font-family: '微软雅黑';color: #555555;font-size: larger;">您的訂單：<span id="TotalNumberPerOrder"></span><?php echo $zh; ?></h3>
			</div>
			<div class="infobox">
				<h6><?php echo $dpdate[3]; ?></h6>
			</div>
		</div>
		<hr style="width: 90%;">
		<div class="push">
			<h4 style="font-family: '微软雅黑';color: #555555;margin-left: 20px;">商家推薦</h4>
			<!--顯示商家推薦-->
			<div class="slide-box">

				<?php
				for ($i = 0; $i < $l; $i++) {
					echo '<div class="slide-item"><div class="wimg2">';
					echo '<img style="width: 120px; height: 120px;" class="wimg" src="' . $push[$i]['pic'] . '"/></div><div class="iinfo"><h5 id = "pname' . $push[$i]['id'] . '" class="wtext">' . $push[$i]['name'] . '</h5>';
					echo '<h5 id="money">$<span id="pmoney' . $push[$i]['id'] . '">' . $push[$i]['money'] . '</span>	</h5></div><div class="pm">';
					echo '<div onclick="minus(\'pnum' . $push[$i]['id'] . '\',\'pname' . $push[$i]['id'] . '\',\'pmoney' . $push[$i]['id'] . '\')" class="mui-icon mui-icon-minus minus"></div>';
					echo '<h5 style="margin-left: 25px;float: left;" id="pnum' . $push[$i]['id'] . '">0</h5>';
					echo '<div onclick="add(\'pnum' . $push[$i]['id'] . '\',\'pname' . $push[$i]['id'] . '\',\'pmoney' . $push[$i]['id'] . '\')" class="mui-icon mui-icon-plus plus"></div>';
					echo '<br>';

					echo '</div></div>';
				}
				?>


			</div>
		</div>

		<div class="main" style="margin-top: 20px;">
			<div class="left">
				<ul class="mui-table-view" style="background-color: #DDDDDD;">

					<?php
					for ($k = 0; $k < $flnum; $k++) {
						echo '<a style="color:#222222" href = "#list' . $k . '"><li class="mui-table-view-cell itext2">' . $fldate[$k]['name'] . '</li></a>';
					}
					?>
				</ul>
			</div>

			<div class="right">

				<span class="itext">
					列表
				</span>
				
				` <!--顯示商品列表-->
				<?php

				for ($k = 0; $k < $flnum; $k++) {
					echo '<ul id="list' . $k . '" class="mui-table-view">';
					for ($u = 0; $u < $menuNumber; $u++) {
						if ($menuDate[$u]['fl'] == $fldate[$k]['id'] && $menuDate[$u]['push'] == 0) {
							echo '<li class="mui-table-view-cell mui-media">';
							echo '<span id="menuNumber' . $menuDate[$u]['id'] . '" class="mui-badge mui-badge-danger" style="background-color:#e81878">0</span>';

							echo '<img class="mui-media-object mui-pull-left" src="' . $menuDate[$u]['pic'] . '">';

							echo '<div class="mui-media-body"><span id="menuName' . $menuDate[$u]['id'] . '">' . $menuDate[$u]['name'] . '</span><span style="color:#e81878;">$<span id="menuMoney' . $menuDate[$u]['id'] . '">' . $menuDate[$u]['money'] . '</span>' . '<p class="mui-ellipsis">' . $menuDate[$u]['info'] . '</p>';
							echo '</div>';
							echo '<br>';

							echo '<div onclick="add1(\'menuNumber' . $menuDate[$u]['id'] . '\',\'menuName' . $menuDate[$u]['id'] . '\',\'menuMoney' . $menuDate[$u]['id'] . '\')" class="mui-icon mui-icon-plus plus1"></div>';
							echo '<div onclick="minus1(\'menuNumber' . $menuDate[$u]['id'] . '\',\'menuName' . $menuDate[$u]['id'] . '\',\'menuMoney' . $menuDate[$u]['id'] . '\')" class="mui-icon mui-icon-minus minus1"></div></li>';
						}
					}
					echo '</ul><br/>';
				}

				?>


			</div>
		</div>
		<div style="height: 40px;"></div>

		<nav class="mui-bar mui-bar-tab">
			<div class="mui-tab-item mui-active" hr='main.html'>
				<span id="hj" class="mui-tab-label" style="color: #e81878;">預計價格：$<span id="TotalPricePerOrder">0.00</span></span>
			</div>


			<div onclick="tj()" class="mui-tab-item" style="background-color: #FF0080;color: white;">
				<span onclick="" class="mui-tab-label"><a style="color: white;" onclick="tj()">點餐</a></span>
			</div>
		</nav>

		<form style="display: none;" id="form" action="" method="post">
			<input type="text" name="data" id="data" value="" />
			<input type="submit" value="" />
		</form>
	</div>

</body>

</html>

<script type="text/javascript">
	var num = 0;
	var tem = {};
	var total = 0;
	var money = 0;

	// 我諗係商家推薦入面嘅buttom
	function add(oid, nid, mid) {
		var a = document.getElementById("ProductName(ShoppingCart)");
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("TotalPricePerOrder");
		var o4 = document.getElementById("TotalNumberPerOrder");
		num = num + 1;

		total += 1;
		//alert(oname);
		tem[oname] = num;
		money = money + omoney;
		if (num > 99) {
			num = 99;
			money = money - omoney;
		}


		a.innerHTML += oname + "  " + 1 + "<br>";
		o.innerHTML = num;
		o3.innerHTML = money;
		o4.innerHTML = total;
		//alert(JSON.stringify(tem));
	}

	function minus(oid, nid, mid) {
		var a = document.getElementById("ProductName(ShoppingCart)");
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("TotalPricePerOrder");
		var o4 = document.getElementById("TotalNumberPerOrder");
		num = num - 1;

		total -= 1;
		//alert(oname);
		money = money - omoney;
		tem[oname] = num;
		if (num < 0 || total < 0) {
			num = 0;
			total += 1;
			money = money + omoney;
		}
		o.innerHTML = num;
		a.innerHTML -= oname - "  " - 1 - "<br>";
		o3.innerHTML = money;
		o4.innerHTML = total;
		//alert(JSON.stringify(tem));
	}

	function add1(oid, nid, mid) {
		var a = document.getElementById("ProductName(ShoppingCart)");
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("TotalPricePerOrder");
		var o4 = document.getElementById("TotalNumberPerOrder");
		num = num + 1;

		total += 1;
		//alert(oname);
		tem[oname] = num;
		money = money + omoney;
		if (num > 99) {
			num = 99;
			money = money - omoney;
		}


		// a.innerHTML = oname+"  "+num+"<br>";
		// a.innerHTML = tem[0] + "<br>";

		a.innerHTML = "";
		
		$.each(tem, function(key, value) {
			a.innerHTML += key + "  " + value + "<hr>";
		});

		o.innerHTML = num;
		o3.innerHTML = money;
		o4.innerHTML = total;
		//alert(JSON.stringify(tem));
	}

	function minus1(oid, nid, mid) {
		var a = document.getElementById("ProductName(ShoppingCart)");
		var o = document.getElementById(oid);
		num = Number(o.innerHTML);
		var o1 = document.getElementById(nid);
		var oname = o1.innerHTML;
		var o2 = document.getElementById(mid);
		var omoney = Number(o2.innerHTML);
		var o3 = document.getElementById("TotalPricePerOrder");
		var o4 = document.getElementById("TotalNumberPerOrder");
		num = num - 1;

		total -= 1;
		//alert(oname);
		money = money - omoney;
		tem[oname] = num;
		if (num < 0 || total < 0) {
			num = 0;
			total += 1;
			money = money + omoney;
		}
		o.innerHTML = num;

		a.innerHTML = "";

		if(num <= 0) {
			delete tem[oname];
		}

		
		$.each(tem, function(key, value) {
			a.innerHTML += key + "  " + value + "<hr>";
		});

		o3.innerHTML = money;
		o4.innerHTML = total;
		//alert(JSON.stringify(tem));
	}

	function tj() {
		if (money == 0) {
			alert('请点餐在提交！');
			return 0;
		}
		var a = document.getElementById("form");
		a.action = "./jiesuan.php?id=<?php echo $id; ?>&num=<?php echo $num; ?>&zh=<?php echo $zh; ?>&money=" + String(money);
		var b = document.getElementById("data");
		b.value = JSON.stringify(tem);
		a.submit();
	}

	function togglePopup() {
		document.getElementById("popup-1").classList.toggle("active");
	}
</script>

</html>