<?php

include '../../../database.php';

$date = $_POST['todayDate'];
header('Content-Type: application/json');
// $date = "2021-08-03";
getTodayProductSaleAmount($date);

function getTodayProductSaleAmount($date)
{

    $conn = OpenCon();
    $sql10 = "SELECT sale_id FROM sales WHERE sale_date = '" . $date . "'";
    $result10 = $conn->query($sql10);
    while ($row10 = $result10->fetch_assoc()) {
        $sql = "SELECT product_id, SUM(quantity) AS total_quantity FROM sale_items_list GROUP BY product_id WHERE sale_id = '" . $row10["sale_id"] . "'";
    }

    $sql = "SELECT wine_list.name,sale_items_list.product_id,SUM(sale_items_list.quantity) as total
    FROM sale_items_list
    INNER JOIN sales ON sales.sale_id = sale_items_list.sale_id
    INNER JOIN wine_list ON sale_items_list.product_id = wine_list.product_id
    WHERE sales.sale_date =  '" . $date . "'
    GROUP BY sale_items_list.product_id
    ORDER BY total DESC LIMIT 10";

    $result = $conn->query($sql);
    $product_quantity_list = array();
    $product_name_list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($product_quantity_list, $row["total"]);
            array_push($product_name_list, $row["name"]);
        }
    }
    if ($result->num_rows == 0) {
        array_push($product_quantity_list, 0);
        array_push($product_name_list, "No data");
    }

    $data[] = ['product_quantity' => $product_quantity_list, 'product_name' => $product_name_list];


    CloseCon($conn);
    echo json_encode($data);
}
