<?php
    $id = $_POST['outbound'];
    if(isset($_POST["submitoutbound"])) {
      if(empty($id))
      {
        echo "<div>You didn't select any sales.</div>";
      }
      else
      {
        include '../../database.php';
        $conn = OpenCon();

        $sql = "INSERT INTO outbound (outbound_id, employee_id, date_of_outbound, outbound_way, outbound_cost, outgoer) VALUES (NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL)";
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
        }
      }
      header("location: sales");
    }
?>
