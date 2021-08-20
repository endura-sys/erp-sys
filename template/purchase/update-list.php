<?php
    require_once('../../database.php');
    $conn = OpenCon();

    if (isset($_POST["updatePurchaseItem"])) {

        $purchase_id = $_POST['purchasing-id'];
        $supplier_id = $_POST['supplier-id'];

        // $purchase_id = "100000001";
        // $supplier_id = "6";

        $sql_update = "UPDATE purchase SET supplier_id='$supplier_id' WHERE purchasing_id='$purchase_id'";
        $result_update = $conn->query($sql_update);

        
        function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }


        console_log($purchase_id, $supplier_id);




        header("location: purchase-list");
    }

    CloseCon($conn);

?>