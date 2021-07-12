<?php
  if(isset($_POST["confirmoutbound"])) {
    $id = $_POST["outbound"];
    $outbounddate = $_POST["outbound_date"];
    $outboundway = $_POST["outbound_way"];
    $outboundcost = $_POST["outbound_cost"];
    $outgoer = $_POST["outgoer"];

      if(empty($id))
      {
        echo "<div>You didn't select any sales.</div>";
      }
      else
      {
        include '../../database.php';
        $conn = OpenCon();

        $sql = "INSERT INTO outbound (outbound_id, employee_id, date_of_outbound, outbound_way, outbound_cost, outgoer) VALUES (NULL, NULL, '$outbounddate', '$outboundway', '$outboundcost', '$outgoer')";
        $result = $conn->query($sql);

        $sql2 = "SELECT MAX(outbound_id) FROM outbound";
        $result2 = $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $out_id = $row["MAX(outbound_id)"];

        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
          $sql = "INSERT INTO `outbound_items` (`outbound_id`, `sale_id`) VALUES ('$out_id', '$id[$i]')";
          $result = $conn->query($sql);

          $sql2 = "SELECT product_id, quantity FROM sale_items where sale_id='". $id[$i] ."'";
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch_assoc()) {
            $product = $row2["product_id"];
            $quantity = $row2["quantity"];
            $sql = "SELECT `stock` FROM `stock_list` WHERE no='$product'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $stock = $row["stock"];
            $newstock = $stock - $quantity;
            $sql3 = "UPDATE `stock_list` SET `stock` = '$newstock' WHERE `stock_list`.`no` = '$product'";
            $result3 = $conn->query($sql3);
          }

        }
      }
      header("location: sales");
    }
?>
