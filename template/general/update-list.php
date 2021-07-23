<?php
    include '../../database.php';
    $conn = OpenCon();

    if (isset($_POST["updateitem"])) {

        $product = $_POST['product'];
        $newp1 = $_POST['updateP1'];
        $newp2 = $_POST['updateP2'];
        $newp3 = $_POST['updateP3'];
        $newlocation = $_POST['updateLocation'];
        $newsake_brewer = $_POST['updateSake_brewer'];
        $newname = $_POST['updateName'];
        $newvolume = $_POST['updateVolume'];
        $newunit = $_POST['updateUnit'];


        $sql_update = "UPDATE wine_list SET name='$newname', location='$newlocation', sake_brewer='$newsake_brewer', p1='$newp1', p2='$newp2', p3='$newp3', volume='$newvolume', unit='$newunit' WHERE product_id='$product'";
        $result_update = $conn->query($sql_update);

        header("location: item-list");

    } else if (isset($_POST["updatesupplier"])) {

        $supplier = $_POST['supplier'];
        $newname = $_POST['updateName'];
        $newemail = $_POST['updateEmail'];


        $sql_update = "UPDATE supplier SET supplier_name='$newname', supplier_email='$newemail' WHERE supplier_id='$supplier'";
        $result_update = $conn->query($sql_update);

        header("location: supplier-list");
    }

    CloseCon($conn);

?>
