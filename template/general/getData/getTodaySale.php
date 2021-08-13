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

    $data[] = ['alipay' => $product_list['alipay'], 'fps' => $product_list['fps'], 'cash' => $product_list['cash'], 'total' => $product_list['total']];


    CloseCon($conn);

    echo json_encode($data);

    // foreach($product_list as $result) {
    //     echo $result, ",";
    // }




}