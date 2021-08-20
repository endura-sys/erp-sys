<?php
    require_once('../../database.php');
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

    }     else if (isset($_POST["updateinbound"])) {

        $inbound = $_POST['inbound'];
        $newemployee_id = $_POST['updateemployee_id'];
        $newinbound_date = $_POST['updateinbound_date'];
        $newinbound_way = $_POST['updateinbound_way'];
        $newinbound_cost = $_POST['updateinbound_cost'];
        

        $sql_update = "UPDATE inbound SET employee_id='$newemployee_id', inbound_date='$newinbound_date', inbound_way='$newinbound_way',inbound_cost= '$newinbound_cost' WHERE inbound_id='$inbound'";
        $result_update = $conn->query($sql_update);

        header("location: inbound");
    }
    else if (isset($_POST["updateoutbound"])) {

        $outbound = $_POST['outbound'];
        $newemployee_id = $_POST['updateemployee_id'];
        $newoutbound_date = $_POST['updateoutbound_date'];
        $newoutbound_way = $_POST['updateoutbound_way'];
        $newoutbound_cost = $_POST['updateoutbound_cost'];
        

        $sql_update = "UPDATE outbound SET employee_id='$newemployee_id', outbound_date='$newoutbound_date', outbound_way='$newoutbound_way',outbound_cost= '$newoutbound_cost' WHERE outbound_id='$outbound'";
        $result_update = $conn->query($sql_update);

        header("location: outbound");
    }
    else if (isset($_POST["updatesales"])) {

        $sale = $_POST['sale'];
        $newCustomer = $_POST['updateCustomer'];
        $neweEmployee = $_POST['updateEmployee'];
        $newesale_date = $_POST['updatesale_date'];
        $newesale_time = $_POST['updatesale_time'];
        $newepayment_method = $_POST['updatepayment_method'];
        $newetotal_sale = $_POST['updatetotal_sale'];
        

        $sql_update = "UPDATE sales SET customer_id='$newCustomer', employee_id='$neweEmployee', sale_date ='$newesale_date', sale_time = '$newesale_time', payment_method = '$newepayment_method', total_sale = '$newetotal_sale' WHERE sale_id='$sale'";
        $result_update = $conn->query($sql_update);

        header("location: sales");
    }
    else if (isset($_POST["updatesupplier"])) {

        $supplier = $_POST['supplier'];
        $newname = $_POST['updateName'];
        $newemail = $_POST['updateEmail'];


        $sql_update = "UPDATE supplier SET supplier_name='$newname', supplier_email='$newemail' WHERE supplier_id='$supplier'";
        $result_update = $conn->query($sql_update);

        header("location: supplier-list");

    } else if (isset($_POST["updatecustomer"])) {

        $customer = $_POST['customer'];
        $newfirstname = $_POST['updateFirstname'];
        $newsurname = $_POST['updateSurname'];
        $newemail = $_POST['updateEmail'];


        $sql_update = "UPDATE customer SET firstname='$newfirstname', surname='$newsurname', email='$newemail' WHERE customer_id='$customer'";
        $result_update = $conn->query($sql_update);

        header("location: customer-list");

    } else if (isset($_POST["updatepurchase"])) {

        $purchasing = $_POST['purchasing'];
        $newsupplier_id = $_POST['updatesupplier_id'];
        $newemployee_id = $_POST['updateemployee_id'];
        $newproduction_date = $_POST['updateproduction_date'];
        $newshelf_life = $_POST['updateshelf_life'];
        $newshelf_date = $_POST['updateshelf_date'];
        $newpayment_status = $_POST['updatepayment_status'];

        $sql_update = "UPDATE purchase SET supplier_id='$newsupplier_id', payment_status = '$newpayment_status', shelf_date = '$newshelf_date', shelf_life = '$newshelf_life', production_date = '$newproduction_date', employee_id = '$newemployee_id' WHERE purchasing_id='$purchasing'";
        $result_update = $conn->query($sql_update);

        header("location: purchase-list");
    }
 

    CloseCon($conn);

?>
