<?php require_once ('helloword.php'); ?>

<?php
	header("Content-Type: text/html;charset=utf-8");
	include './admin/func/fuc.php';
	$getdate = new getDate();
	$zh = $getdate -> getGet("zh");
	$num = $getdate -> getGet("num");
	$id = $getdate -> getGet("id");
	$money = $getdate -> getGet("money");
	$data = $getdate -> getPost('data');
//查询数据
$datebase = new Datebase();
$sql = "SELECT id, fl, name, money, pic, info, push FROM wine_list";
$cdres = $datebase -> querySql($sql,"./admin/func/config.php");
$cddate = $datebase -> useDate($cdres);
$cdnum = count($cddate);
$url = "\"./tj.php?num=".$num."&zh=".$zh."&money=".$money."\"";
if($id){
	$sql1 = "SELECT * FROM order_record where id='$id'";
	$odres = $datebase -> querySql($sql1,"./admin/func/config.php");
	$od = $datebase -> useDate($odres);
	$zh = $od[0]['num'];
	$num = $od[0]['pnum'];
	$url = "\"./tj.php?id=".$id."&money=".$money."\"" ;


}

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
            .color{
			background-color: #332;
				color: #C29E00;
            }
</style>
<body style="text-align: center;margin: auto;">
	<div class="mui-content">
		<header class="mui-bar mui-bar-nav color">
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left color"></a>
		    <h1 class="mui-title color">確認訂單</h1>
		</header>
		<div style="height: 60px;"></div>
		<div class="info">
			<!-- <img src="img/jsu.png"/> -->
			<h4>合計價格:<span style="color: #e81878;">$<?php echo $money; ?></span></h4>
		</div>
		<p style="float: left;margin-left: 40px;">訂單詳情：</p>
		<br/><br/>
	   <!-- <div style="text-align: center;">  -->
        <table width="80%" class="table" id="tablevalue">
            <tr><th width=50%>菜名</th><th width=20%>數量</th><th width=30%>價格</th></tr>
                
				<?php
				
					$info = json_decode($data); 
					
                	foreach($info as $name => $number){
						echo $name;
                		for($i=0;$i<$cdnum;$i++){
							
                			if($cddate[$i]['name']==$name){
                				$dmoney = $cddate[$i]['money'];
                			}
						}
						
						echo'<tr><td>'.$name.'</td><td>'.$number.'</td><td>'.$dmoney.'</td></tr>';
					}
                	
                	?>
                
                
             
        </table>
		<p></p>
        <button onclick="tj();" type="button" class="mui-btn  mui-btn-block color">確認點餐</button>
    </div>
<form style="display: none;" id="form" action="" method="post">
        	<input type="text" name="data" id="data" value="" />
        	<input type="submit" value=""/>
        </form>
</body>

<script type="text/javascript">
	function tj(){

		var a = document.getElementById("form");
		a.action = <?php echo $url; ?>;
		var b = document.getElementById("data");
		var tem = <?php echo $data; ?>;
		b.value = JSON.stringify(tem);
		a.submit();
	}
</script>