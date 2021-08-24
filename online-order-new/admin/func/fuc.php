<?php
date_default_timezone_set('PRC'); //设置中国时区
	//作者:dalaoLiu，QQ:601943267
class getDate {

	//获取get数据
	public function getGet($name){
		if(isset($_GET[$name])){
			return $_GET[$name];
		}else{
			return 0;
		}
	}
	//获取post数据
	public function getPost($name){
		if(isset($_POST[$name])){
			return $_POST[$name];
		}else{
			return 0;
		}
	}
}

class login {
	//读取配置
	protected function getConfig($url){
		include $url;
		$config = $datebase;
		return $config;
	}
	//连接数据库
	protected function conn($config){
		$conn = new mysqli($config['host'],$config['user'],$config['pass'],$config['db'],$config['port']);
		if ($conn->connect_errno){
			return 0;
		}else{
			$conn->set_charset('utf8');
			return $conn;
		}
	}
	//验证登陆
	public function userLogin($user,$pass){
		$pas = md5($pass);
		$use = addslashes($user);
		$sql = "SELECT * FROM account WHERE user = '$use' AND pass = '$pas'";
		$config = $this->getConfig("config.php");
		$conn = $this->conn($config);
		$res = $conn -> query($sql);
		//echo $sql;
		if(!$res){
			echo 1;
			return 0;
		}else{
			//echo 2;
			$row = $res -> fetch_row();
			//var_dump($row);
			if($row[1]==$user){
				return $row;
			}else{
				//var_dump($res);
				return 0;
			}
		}
		$conn ->close(); 
	}
}

class Datebase{
		//读取配置
	protected function getConfig($url){
		include $url;
		$config = $datebase;
		return $config;
	}
	//连接数据库
	protected function conn($config){
		$conn = new mysqli($config['host'],$config['user'],$config['pass'],$config['db'],$config['port']);
		if ($conn->connect_errno){
			return 0;
		}else{
			$conn->set_charset('utf8');
			return $conn;
		}
	}
	
	//执行sql
	public function querySql($sql,$url){
		$conn = $this->conn($this->getConfig($url));
		$res = $conn -> query($sql);
		if($res){
			return $res;
		}else{
			return 0;
		}
		$conn -> close();
	}

	//解析数据
	public function useDate($res){
		$date = $res -> fetch_all(MYSQLI_ASSOC);
		return $date;
	}
	
}
?>