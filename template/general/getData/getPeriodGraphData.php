<?php

include '../../../database.php';

// $date = $_POST['todayDate'];
// $date = "2021-08-03";
getTodayProductSaleAmount();

function getTodayProductSaleAmount(){

    $conn = OpenCon();
    $sql = "SELECT SUM(total_sale), MONTH(sale_date)
    FROM sales
    GROUP BY MONTH(sale_date)";
    
    $result = $conn->query($sql);

    $product_list = array();
    for ($i = 0; $i < 12; $i ++) {
        $product_list[$i] = 0;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $product_list[$row["MONTH(sale_date)"]] = (int)$row["SUM(total_sale)"];
            }
        }
        
        echo json_encode($product_list);

        foreach($product_list as $result) {
            // echo $result, ",";
        }

    }



