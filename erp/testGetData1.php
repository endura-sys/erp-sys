<?php

include 'database.php';

$conn = OpenCon();
	
    // 設定 MySQL 的連線資訊並開啟連線
    // 資料庫位置、使用者名稱、使用者密碼、資料庫名稱
    $conn -> set_charset("UTF8"); // 設定語系避免亂碼

    $result = $conn -> query("SELECT * FROM `users`");
    while($stmt->fetch()){
        $list[] = array('id' => $fid, 'name' => $fname);
    }
    $stmt->free_result();
    $stmt->close();
    echo json_encode($list);

    $conn -> close(); // 關閉資料庫連線

?>