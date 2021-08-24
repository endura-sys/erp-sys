<?php
  if(isset($_POST["confirminbound"])) {
    //$id = $_POST["inbound"];
    // $id = $purchase;
    $inbound_id = $_POST["inbound_id"];
    $employee_id = $_POST["employee_id"];
    $inbounddate = $_POST["inbound_date"];
    $inboundway = $_POST["inbound_way"];
    $inboundcost = $_POST["inbound_cost"];

    //   if(empty($id))
    //   {
    //     echo "<div>You didn't select any purchase.</div>";
    //   }
    //   else
    //   {
        include '../..database.php';
        $conn = OpenCon();

        $sql = "INSERT INTO `inbound` (inbound_id, employee_id, inbound_date, inbound_way, inbound_cost) VALUES ('$inbound_id', $employee_id, '$inbounddate', '$inboundway', '$inboundcost')";
        $result = $conn->query($sql);

    

        // $N = count($id);
        // for($i=0; $i < $N; $i++)
        // {
        //   $sql = "INSERT INTO `inbound_items_list` (`inbound_id`, `purchasing_id`) VALUES ('$inbound_id', '$id[$i]')";
        //   $result = $conn->query($sql);

        //   $sql_status = "UPDATE purchase SET inbound_status = '1' WHERE purchasing_id='" . $id[$i] . "'";
        //   $result = $conn->query($sql_status);

        //   $sql2 = "SELECT product_id, quantity FROM purchase_items_list where purchasing_id='". $id[$i] ."'";
        //   $result2 = $conn->query($sql2);
        //   while($row2 = $result2->fetch_assoc()) {
        //     $product = $row2["product_id"];
        //     $quantity = $row2["quantity"];
        //     $sql = "SELECT `stock` FROM `stock` WHERE product_id='$product'";
        //     $result = $conn->query($sql);
        //     $row = $result->fetch_assoc();
        //     $stock = $row["stock"];
        //     $newstock = $stock + $quantity;
        //     $sql3 = "UPDATE `stock` SET `stock` = '$newstock' WHERE `stock`.`product_id` = '$product'";
        //     $result3 = $conn->query($sql3);
        //   }

        // }
    //   }
      header("location: purchase-info");
    }
?>