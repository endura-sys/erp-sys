<?php

include '../../../database.php';

// $date = $_POST['todayDate'];

$date = "2021-08-03";
getTodayProductSaleAmount($date);

function getTodayProductSaleAmount($date){

    $conn = OpenCon();
    $sql = "SELECT sale_id as s_id, sale_date FROM sales WHERE sale_date = '" . $date . "'";
    $sql1 = "SELECT sale_id as s_i_id, product_id, quantity FROM sale_items_list WHERE sale_date = '" . $date . "'";
    
    $sql2 = "SELECT DISTINCT si.sale_id, si.product_id,si_n.total_quantity, s.sale_id, s.sale_date, w.product_id, w.name
            FROM sale_items_list as si, sales as s, wine_list as w
            JOIN (SELECT product_id, SUM(quantity) AS total_quantity
                FROM sale_items_list
                GROUP BY product_id) as si_n
            WHERE si.product_id = si_n.product_id
            AND si.sale_id = s.sale_id
            AND si_n.product_id = w.product_id
            AND s.sale_date = '" . $date . "'";
    
    
    // SELECT si.sale_id, si.product_id, si.quantity, s.sale_id, s.sale_date, w.product_id, w.name
    //          FROM sale_items_list as si, sales as s, wine_list as w
    //          WHERE si.sale_id = s.sale_id
    //          AND si.product_id = w.product_id
    //          AND s.sale_date = '" . $date . "'";

             
            //  ORDER BY `si`.`product_id` ASC";




            // SELECT si.sale_id, si.product_id, si.quantity, s.sale_id, s.sale_date, w.product_id, w.name
            //  FROM sale_items_list as si, sales as s, wine_list as w
            //  JOIN (SELECT product_id, SUM(quantity) AS TotalQuantity
            //        FROM sale_items_list
            //        GROUP BY product_id)
            //  WHERE si.sale_id = s.sale_id
            //  AND si.product_id = w.product_id
            //  AND s.sale_date = "2021-08-03"

            // (SELECT si.product_id, SUM(si.quantity) as TotalQuantity
            //        FROM sale_items_list as si
            //        GROUP BY si.product_id)

            // SELECT si.sale_id, si.product_id, s.sale_id, s.sale_date, w.product_id, w.name
            //  FROM sale_items_list as si, sales as s, wine_list as w
            //  JOIN (SELECT product_id, SUM(quantity) AS TotalQuantity
            //        FROM sale_items_list
            //        GROUP BY product_id) as si_n
            //  WHERE si.product_id = si_n.product_id
            //  AND si.sale_id = s.sale_id
            //  AND si_n.product_id = w.product_id
            //  AND s.sale_date = "2021-08-03"

    $result = $conn->query($sql2);

    $product_list = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
            // $product_list[$row["product_id"]] += $row["quantity"];

            $data[] = ['id' => $row["product_id"], 'name' => $row["name"], 'quantity' => $row["total_quantity"]];
            // array_push($product_list, array($row["product_id"] => $row['quantity']));

            // echo $row["product_id"] . ", +++ ";
            // echo $row["s.sale_date"];
            }
        }

        
        // rsort($product_list);
        echo str_replace(array('[', ']'), '\'', htmlspecialchars(json_encode($data), ENT_NOQUOTES));

        // foreach($product_list as $result) {
        //     echo $result, ",";
        // }

    }



