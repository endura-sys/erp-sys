<?php

function getTodaySale($date)
{

    include '../../database.php';
    $conn = OpenCon();

    $sql = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales";
    $result = $conn->query($sql);

    $alipaySale = 0;
    $fpsSale = 0;
    $cashSale = 0;

    $product_list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($date = $row["payment_date"]) {
                switch ($row["payment_method"]) {
                    case "alipay":
                        $alipaySale += $row["total_sale"];
                    case "FPS":
                        $fpsSale += $row["total_sale"];
                    case "cash":
                        $cashSale += $row["total_sale"];
                }
            }
        }
    }
    array_push($product_list, $alipaySale);
    array_push($product_list, $fpsSale);
    array_push($product_list, $cashSale);
    CloseCon($conn);
    return $product_list;
}

?>