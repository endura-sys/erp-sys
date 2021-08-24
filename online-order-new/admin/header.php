<?php
include './func/yz.php';	
$act0 = "";
$act1 = "";
$act2 = "";
$act3 = "";
$act4 = "";
$act5 = "";
if(!isset($_GET['act'])){
	$act0 = "active";
}else if($_GET['act']=='0'){
	$act0 = "active";
}	else if($_GET['act']=='1'){
	$act1 = "active";
}	else if($_GET['act']=='2'){
	$act2 = "active";
}	else if($_GET['act']=='3'){
	$act3 = "active";
}	else if($_GET['act']=='4'){
	$act4 = "active";
}	else if($_GET['act']=='5'){
	$act5 = "active";
}	

 
	echo "  <nav class=\"navbar navbar-default\" role=\"navigation\">
  <div class=\"container-fluid\"> 
  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"
        data-target=\"#example-navbar-collapse\">
      <span class=\"sr-only\">切换导航</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>
    <a class=\"navbar-brand\" href=\"#\">点餐系统后台</a>
  </div>
  <div class=\"collapse navbar-collapse\" id=\"example-navbar-collapse\">
    <ul class=\"nav navbar-nav\">
      <li class=\"".$act0."\"><a href=\"index.php\"><span class=\"glyphicon glyphicon-home\">首页</span></a></li>
      <li class=\"".$act2."\"><a href=\"fl.php?act=2\"><span class=\"glyphicon glyphicon-ok\">分类管理</span></a></li>
      <li class=\"".$act3."\"><a href=\"cd.php?act=3\"><span class=\"glyphicon glyphicon-user\">菜单管理</span></a></li>
      <li><a href=\"exit.php\"><span class=\"glyphicon glyphicon-log-out\">安全退出</span></a></li>
    </ul>
  </div>
  </div>
</nav>";
	?>
