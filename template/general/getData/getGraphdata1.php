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
    while($row10 = $result10->fetch_assoc()){
        $sql2 = "SELECT product_id, SUM(quantity) AS total_quantity FROM sale_items_list GROUP BY product_id WHERE sale_id = '" . $row10["sale_id"] ."'";
    }

    $sql2 = "SELECT wine_list.name,sale_items_list.product_id,SUM(sale_items_list.quantity) as total
    FROM sale_items_list
    INNER JOIN sales ON sales.sale_id = sale_items_list.sale_id
    INNER JOIN wine_list ON sale_items_list.product_id = wine_list.product_id 
    WHERE sales.sale_date =  '" . $date . "'
    GROUP BY sale_items_list.product_id
    ORDER BY total DESC LIMIT 10";

    $sql3 = "SELECT DISTINCT si.sale_id, si.product_id, w.name, SUM(si.quantity) as total_quantity
    FROM sale_items_list si, wine_list w
    	JOIN (SELECT s.sale_id, s.sale_date
              FROM sales s
              WHERE sale_date = '" . $date . "') AS s_n
        WHERE si.sale_id = s_n.sale_id
        AND si.product_id = w.product_id
		GROUP BY si.product_id, si.sale_id ";

  

    // SELECT s.*, w.product_id, w.name, si.quantity
    // FROM sales s, wine_list w
    // 	JOIN (SELECT * 
    //           FROM sale_items_list si) AS si
    //     WHERE si.sale_id = s.sale_id
    //     AND si.product_id = w.product_id
    //     AND s.sale_time = "2021-08-09"


    // SELECT DISTINCT si.sale_id, si.product_id, w.product_id, w.name, SUM(si.quantity) as total_quantity
    // FROM sale_items_list si, wine_list w
    // 	JOIN (SELECT s.sale_id, s.sale_date
    //           FROM sales s
    //           WHERE sale_date = "2021-08-09") AS s_n
    //     WHERE si.sale_id = s_n.sale_id
    //     AND si.product_id = w.product_id
	// 	GROUP BY si.product_id, si.sale_id


// SELECT si.sale_id, si.product_id, si_n.total_quantity, s.sale_id, s.sale_date, w.product_id, w.name
// sale_items_list AS si,
// LEFT JOIN (
// SELECT s.sale_id, s.sale_date,
// SUM(Quantity) AS Purchase
// FROM AccuPurchaseInvoice
// GROUP BY ProductID
// )p
// ON p.ProductID = pr.RecordID
// LEFT JOIN (
// SELECT ProductID,
// SUM(Quantity) AS Sales
// FROM AccuSaleCustomer
// GROUP BY ProductID
// )s
// ON s.ProductID = pr.RecordID

    $result = $conn->query($sql2);
    $product_quantity_list = array();
    $product_name_list = array();

    // ------------Working version1 for json to dict------------
    // echo "'{";
    // echo "</br>";
    // ------------Working version1 for json to dict------------

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // $product_list[$row["product_id"]] += $row["total_quantity"];
            // $product_quantity_list[$row["product_id"]] += $row["total_quantity"];
            array_push($product_quantity_list, $row["total"]);
            array_push($product_name_list, $row["name"]);
            // $product_name_list[$row["product_id"]] += $row["name"];
        }
    }

    // ------------Working version1 for json to dict------------
    // echo "}'";
    // ------------Working version1 for json to dict------------

    // echo str_replace(array('[', ']'), '\'', htmlspecialchars(json_encode($data), ENT_NOQUOTES));
    $data[] = ['product_quantity' => $product_quantity_list, 'product_name' => $product_name_list];


    // $output =  json_encode($product_quantity_list);
    // json_encode($product_name_list);
    CloseCon($conn);
    echo json_encode($data);


    // echo json_encode($product_quantity_list);
    // echo json_encode($product_name_list);


}
