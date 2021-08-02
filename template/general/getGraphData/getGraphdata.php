<?php

include '../../../database.php';

$date = $_POST['todayDate'];
getTodaySale($date);

function getTodaySale($date)
{
    $conn = OpenCon();

    $sql = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales WHERE sale_date = '" . $date . "'";
    $sql1 = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales";
    $result = $conn->query($sql);

    // Initial the array
    $product_list = array();
    $product_list['alipay'] += 0;
    $product_list['fps'] += 0;
    $product_list['cash'] += 0;
    $product_list['total'] += 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // echo $row["total_sale"] . ", ";
            if ($row["payment_method"] == "alipay") {
                $product_list['alipay'] += $row["total_sale"];
            }
            else if ($row["payment_method"] == "fps") {
                $product_list['fps'] += $row["total_sale"];
            }
            else if ($row["payment_method"] == "cash") {
                $product_list['cash'] += $row["total_sale"];
            }
        }
    }
    $product_list['total'] += $product_list['alipay'];
    $product_list['total'] += $product_list['fps'];
    $product_list['total'] += $product_list['cash'];
    CloseCon($conn);

    foreach($product_list as $result) {
        echo $result, ",";
    }
}

echo "";

$date = "2021-07-28";
getTodayProductSaleAmount($date);

function getTodayProductSaleAmount($date){

    $conn = OpenCon();
    $sql = "SELECT sale_id as s_id, sale_date FROM sales WHERE sale_date = '" . $date . "'";
    $sql1 = "SELECT sale_id as s_i_id, product_id, quantity FROM sale_items_list WHERE sale_date = '" . $date . "'";
    
    $sql2 = "SELECT si.sale_id, si.product_id, si.quantity, s.sale_id, s.sale_date
             FROM sale_items_list as si
             LEFT JOIN sales as s
             on s.sale_date = '" . $date . "'";
            //  ORDER BY `si`.`product_id` ASC";

    $result = $conn->query($sql2);

    $product_list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
            $product_list[$row["product_id"]] += $row["quantity"] ;

            // echo $row["product_id"] . ", +++ ";
            // echo $row["s.sale_date"];
            }
        }
        rsort($product_list);
        foreach($product_list as $result) {
            echo $result, ",";
        }

    }



