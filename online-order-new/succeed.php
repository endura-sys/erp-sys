<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
header("Content-Type: text/html;charset=utf-8");
	include './admin/func/fuc.php';
	$getdate = new getDate();
	$id = $getdate -> getGet("id");
	$act = $getdate -> getGet("act");
	if(!$act){
		$dis = "display:none;";
	}
	//查询数据
	$datebase = new Datebase();
	$sql = "SELECT * FROM order_record where id='$id'";
	$sql1 = "SELECT * FROM order_qrcode where id=1";
	$res = $datebase -> querySql($sql,"./admin/func/config.php");
	$date = $datebase -> useDate($res);
	$res1 = $datebase -> querySql($sql1,"./admin/func/config.php");
	$data = $res1 -> fetch_row();
	?>

<!DOCTYPE html>
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
	.color{
		background-color: #DD524D;
		color: white;
	}
	        .table {
                border: 1px solid #cad9ea;
                color: #666;
                margin: auto;
            }

            .table th {
                background-repeat: repeat-x;
                height: 60px;
            }

            .table td,
            .table th {
                border: 1px solid #cad9ea;
                padding: 0 1em 0;
                height: 40px;
            }

            .table tr.alter {
                background-color: #f5fafe;
            }
            #money{color: red;}
</style>
<body style="text-align: center;margin: auto;">
	<div class="mui-content">
		<div style="text-align: center; margin-top: 10%;">
			 <img src="img/succeed.png"/>
			 <h4>点餐成功！正在为您备餐！</h4>
		</div>
	   <div style="text-align: center;"> 
        <table width="80%" class="table" id="tablevalue">
            <tr><th width=80%>菜名</th><th width=20%>数量</th></tr>
                
                <?php
                	$info = json_decode($date[0]['info']);
                	foreach($info as $name => $number){
					echo '<tr><td>'.$name.'</td><td>'.$number.'</td></tr>';
					}
                	
                	?>
        </table>

        <img width="200px" height="200px" src="<?php echo $data[1]; ?>"/>
    	<h5>请长按二维码支付餐费 <span id="money">
    		￥<?php echo $date[0]['money']; ?>
    	</span></h5>
	  
	  <div style="height: 60px;">
	  	
	  </div>
	 <button onclick="tz();" type="button" class="mui-btn  mui-btn-block color">继续点餐</button>
	   </div>

</body>

<script type="text/javascript">
	function tz(){
		window.location.href="./order.php";
	}
</script>