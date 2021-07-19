<?php
  if(isset($_POST["confirmoutbound"])) {
    $id = $_POST["outbound"];
    $outbound_id = $_POST["outbound_id"];
    $employee_id = $_POST["employee_id"];
    $outbounddate = $_POST["outbound_date"];
    $outboundway = $_POST["outbound_way"];
    $outboundcost = $_POST["outbound_cost"];

      if(empty($id))
      {
        echo "<div>You didn't select any sales.</div>";
      }
      else
      {
        include '../../database.php';
        $conn = OpenCon();

        $sql = "INSERT INTO outbound (outbound_id, employee_id, outbound_date, outbound_way, outbound_cost) VALUES ('$outbound_id', $employee_id, '$outbounddate', '$outboundway', '$outboundcost')";
        $result = $conn->query($sql);

        // $sql2 = "SELECT MAX(outbound_id) FROM outbound";
        // $result2 = $conn->query($sql2);
        // $row = $result2->fetch_assoc();
        // $out_id = $row["MAX(outbound_id)"];

        $N = count($id);
        for($i=0; $i < $N; $i++)
        {
          $sql = "INSERT INTO `outbound_items_list` (`outbound_id`, `sale_id`) VALUES ('$outbound_id', '$id[$i]')";
          $result = $conn->query($sql);

          $sql2 = "SELECT product_id, quantity FROM sale_items_list where sale_id='". $id[$i] ."'";
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch_assoc()) {
            $product = $row2["product_id"];
            $quantity = $row2["quantity"];
            $sql = "SELECT `stock` FROM `stock` WHERE product_id='$product'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $stock = $row["stock"];
            $newstock = $stock - $quantity;
            $sql3 = "UPDATE `stock` SET `stock` = '$newstock' WHERE `stock`.`product_id` = '$product'";
            $result3 = $conn->query($sql3);
          }

        }
      }
      header("location: sales");
    }
?>
