<?php
// header('Content-Type: application/json');


// $aResult = array();

// if (!isset($_GET['functionname'])) {
//     $aResult['error'] = 'No function name!';
// }

// if (!isset($_GET['arguments'])) {
//     $aResult['error'] = 'No function arguments!';
// }

// if (!isset($aResult['error'])) {

//     switch ($_GET['functionname']) {
//         case 'getTodaySale':
//             if (!is_array($_GET['arguments'])) {
//                 $aResult['error'] = 'Error in arguments!';
//             } else {
//                 $aResult['result'] = getTodaySale($_GET['arguments'][0]);
//             }
//             break;

//         default:
//             $aResult['error'] = 'Not found function ' . $_GET['functionname'] . '!';
//             break;
//     }
// }

// echo json_encode($aResult);
$date = $_POST['todayDate'];
// $date = "2021-07-28";
getTodaySale($date);

function getTodaySale($date)
{
    include '../../../database.php';
    $conn = OpenCon();

    // $date = $_GET['date'];

    $sql = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales WHERE sale_date = '" . $date . "'";
    $sql1 = "SELECT sale_date, sale_time, payment_method, total_sale FROM sales";
    $result = $conn->query($sql);

    // $alipaySale = 0;
    // $fpsSale = 0;
    // $cashSale = 0;


    // Initial the array
    $product_list = array();
    $product_list['alipay'] += 0;
    $product_list['fps'] += 0;
    $product_list['cash'] += 0;


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
    // array_push($product_list, $alipaySale);
    // array_push($product_list, $fpsSale);
    // array_push($product_list, $cashSale);
    CloseCon($conn);

    foreach($product_list as $result) {
        echo $result, ",";
    }
    
    // echo $product_list;
    // echo print_r($product_list);
    // echo var_dump($product_list);
}


