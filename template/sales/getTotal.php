<?php
    $product = $_POST['productid'];
    $quantity = $_POST['quantity'];

    // $product=1;

    include '../../database.php';
    $conn = OpenCon();

    // $sql = "SELECT * FROM wine_list WHERE product_id = '" . $product . "'";
    // $result = $conn->query($sql);
    //
    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         $price = $row["p2"];
    //     }
    // }
    echo $product;
    // echo $price;
?>
