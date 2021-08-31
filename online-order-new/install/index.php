<?php
!defined( 'DB_CHARSET' ) && define( 'DB_CHARSET' , 'utf8' );// 数据库保存编码, 不可缺少
header( 'Content-Type:text/html; charset=utf-8' ); // 本程序执行编码

//判断文件是否存在
$a = file_exists("./install.lock");

if($a){
	echo "++++++++++++++++++++++++++++++++++++<br>";
	echo "+程序已经安装，请删除insta文件夹下的install.lock文件！+<br>";
	echo "++++++++++++++++++++++++++++++++++++<br>";
	exit;
}

// 显示填写mysql信息的表单 , 并停止
if ( !isset( $_POST['dbinfo'] ) ) {
	include 'install_form.html';
	exit;
}

// 提交表单后, 获得mysql账号信息
$db = array(  );
$data = $_POST['dbinfo'];
$db['host'] = $data['dbhost'];
$db['dbname'] = $data['dbname'];
$db['user'] = $data['dbuser'];
$db['pwd'] = $data['dbpw'];
$db['port'] = $data['dbport'];

// 导入数据文件
$sql_file = dirname(__FILE__)."/dc.sql";
run_sql_file( $sql_file , $db );

// 生成已安装文件
fopen("./install.lock", "w") or die("Unable to open file!");

//写入配置文件
$myfile = fopen("../admin/func/config.php", "w") or die("Unable to open file!");
$txt = "<?php 
\$datebase = [
\"user\" => \"".$db['user']."\",
\"pass\" => \"".$db['pwd']."\",
\"host\" => \"".$db['host']."\",
\"port\" => \"".$db['port']."\",
\"db\" => \"".$db['dbname']."\"
];
?>";
fwrite($myfile, $txt);
fclose($myfile);
// 安装完成 , 跳转回首页
echo "
\n\r<pre>
+-------------+-------------+-------------+
            安装完成。... 
</pre>
\n\r

<meta http-equiv='refresh' content='2;url=../index.php' />
";



/* 执行mysql数据文件.  参数: 数据文件 , 数据库账号信息 */
function run_sql_file( $sql_file , $dbconfig ) {
	$host = $dbconfig['host'] ;
	$dbname = $dbconfig['dbname'] ;
	$user = $dbconfig['user'] ;
	$pwd = $dbconfig['pwd'] ;

	// 连接mysql数据库
	$conn = mysql_connect($host,$user,$pwd) or die( '连接mysql错误：'.mysql_error() );

	// 删除旧的数据库 
	mysql_query( "DROP database IF EXISTS {$dbname} ;" ) or die ( "重新建立新的数据库 操作失败，无法删除【旧】数据库, 请检查mysql操作权限。错误信息: \n".mysql_error() ); 

	// 重新建立新数据库
	mysql_query( "CREATE DATABASE {$dbname} CHARACTER SET ".DB_CHARSET." ;" ) or die ( "无法创建数据库, 请检查mysql操作权限。错误信息: \n".mysql_error() ); 

	// 选择数据库
	mysql_select_db($dbname,$conn) or die( "连接数据库名 {$dbname} 错误：\n".mysql_error() );


	/* ############ 数据文件分段执行 ######### */
	$sql_str = file_get_contents( $sql_file );
	$piece = array(  ); // 数据段
	preg_match_all( "@([\s\S]+?;)\h*[\n\r]@" , $sql_str , $piece ); // 数据以分号;\n\r换行  为分段标记
	!empty( $piece[1] ) && $piece = $piece[1];
	$count = count($piece);
	if ( $count <= 0 ) {
		exit( 'mysql数据文件: '. $sql_file .' , 不是正确的数据文件. 请检查安装包.' );
	}

	$tb_list = array(  ); // 表名列表
	preg_match_all( '@CREATE\h+TABLE\h+[`]?([^`]+)[`]?@' , $sql_str , $tb_list );
	!empty( $tb_list[1] ) && $tb_list = $tb_list[1];
	$tb_count = count( $tb_list );

	// 开始循环执行
	for($i=0;$i<$count ;$i++){

		$sql = $piece[$i] ;
		mysql_query("SET character_set_connection='".DB_CHARSET."', character_set_results='".DB_CHARSET."', character_set_client='binary'");
		$result = mysql_query($sql);
		
		// 建表数量
		if ( $i < $tb_count ) {
			echo "<span style='display: inline-block; width: 200px;'>创建表: ".$tb_list[ $i ]. '</span>';
			if($result){
				echo " <font color='green'>成功</font> ......";
				
			}
			else {
				echo " <font color='red'>失败</font> , 原因:".mysql_error();
			}
			echo "<br />\n";
		}
		// 执行其它语句
		else {
			if(!$result){
				echo "\n<br /> sql语句执行<font color='red'>失败</font> , 原因:".mysql_error();
			}
		}
	}
	
}