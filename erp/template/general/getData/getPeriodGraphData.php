<?php

include '../../../database.php';
header('Content-Type: application/json');

// $date = $_POST['todayDate'];
// $date = "2021-08-03";
getTodayProductSaleAmount();

function getTodayProductSaleAmount()
{

    $conn = OpenCon();
    $sql = "SELECT SUM(total_sale), MONTH(sale_date)
    FROM sales
    GROUP BY MONTH(sale_date)";

    $result = $conn->query($sql);

    $product_list = array();
    for ($i = 0; $i < 12; $i++) {
        $product_list[$i] = 0;
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $product_list[(int)$row["MONTH(sale_date)"] - 1] = (int)$row["SUM(total_sale)"];
        }
    }

    $data[] = ["yearGrossProfit" => $product_list];

    CloseCon($conn);

    echo json_encode($data);


    // foreach ($product_list as $result) {
    //     // echo $result, ",";
    // }
}
