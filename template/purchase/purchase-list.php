<?php include('../header.php'); ?>
<?php $currentPage = 'purchase-list'; ?>
<?php

?>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <?php include('../datatable-navbar.php'); ?>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>


        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Purchase List</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">

  

                        <div class="card-header">
                            Simple Datatable

                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#border-add">
                                Add new data
                            </button>
                            <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new purchase</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form data-target="#border-added" method="post">
                                                <div class="row">

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">

                                                            <?php
                                                            $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');

                                                            $sql_purchase = "SELECT MAX(purchasing_id) FROM purchase";
                                                            $result_purchase = $conn->query($sql_purchase);
                                                            $row_purchase = $result_purchase->fetch_assoc();
                                                            $purchase = (int) $row_purchase["MAX(purchasing_id)"];
                                                            $purchase++;

                                                            ?>

                                                            <label for=purchasing_id>Purchasing ID:</label>
                                                            <input type="integer" class="form-control" name="purchasing_id" value="<?php echo $purchase; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="supplier_id">Supplier ID:</label>
                                                            <select name="supplier_id" class="form-control form-control-md">
                                                                <option value="">Select Supplier ID</option>
                                                                <?php
                                                                $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');


                                                                $sql0 = "SELECT supplier_id, supplier_name FROM supplier";
                                                                $result0 = $conn->query($sql0);
                                                                while ($row0 = $result0->fetch_assoc()) {
                                                                ?>
                                                                    <option value="<?php echo $row0["supplier_id"] ?>"><?php echo $row0["supplier_name"]; ?></option>

                                                                <?php
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="employee_id">Employee ID:</label>
                                                            <select name="employee_id" class="form-control form-control-md">
                                                                <option value="">Select Employee ID</option>
                                                                <?php
                                                                $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');


                                                                $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                $result0 = $conn->query($sql0);
                                                                while ($row0 = $result0->fetch_assoc()) {
                                                                ?>
                                                                    <option value="<?php echo $row0["employee_id"] ?>"><?php echo $row0["firstname"]; ?></option>

                                                                <?php
                                                                }

                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="production_date">Production date:</label>
                                                            <input type="date" class="form-control" name="production_date">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="shelf_life">Shelf life:</label>
                                                            <input type="varchar" class="form-control" name="shelf_life">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="payment_status">Payment status:</label>
                                                            <input type="varchar" class="form-control" name="payment_status">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="shelf_date">Shelf date:</label>
                                                            <input type="date" class="form-control" name="shelf_date">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-group">
                                                            <label for="status">Inbound status:</label>
                                                            <select name="status" class="form-control form-control-md">
                                                                <option value="">Select Status</option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-sm-6 col-md-6">Product ID:</th>
                                                                    <th class="col-sm-6 col-md-6">Quantity:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody">
                                                                <tr>
                                                                    <th>
                                                                        <input type="integer" class="form-control" name="product_id[]">
                                                                    </th>

                                                                    <th>
                                                                        <input type="integer" class="form-control" name="quantity[]">
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-primary" onclick="add()">
                                                                    <i class="bi bi-plus-circle"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <form data-target="#border-added" method="post">
                                                        <input type="submit" class="btn-check" value="Submit" id='submit'>
                                                        <label class="btn btn-primary" for="submit">Submit</label>
                                                    </form>
                                                    <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade text-left modal-borderless" id="border-added" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new data</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <tbody>
                                                    <center>
                                                        <?php

                                                        $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');

                                                        // Check connection
                                                        if ($conn === false) {
                                                            die("ERROR: Could not connect. "
                                                                . mysqli_connect_error());
                                                        }

                                                        $purchasing_id =  $_REQUEST['purchasing_id'];
                                                        $supplier_id = $_REQUEST['supplier_id'];
                                                        $employee_id = $_REQUEST['employee_id'];
                                                        $production_date = $_REQUEST['production_date'];
                                                        $shelf_life = $_REQUEST['shelf_life'];
                                                        $payment_status = $_REQUEST['payment_status'];
                                                        $shelf_date = $_REQUEST['shelf_date'];
                                                        $status = $_REQUEST['status'];
                                                        $product =  $_REQUEST['product_id'];
                                                        $quantity = $_REQUEST['quantity'];


                                                        // Performing insert query execution
                                                        $sql = "INSERT INTO purchase VALUES ('$purchasing_id','$supplier_id','$employee_id','$production_date','$shelf_life','$shelf_date','$payment_status','$status')";
                                                        $result = $conn->query($sql);

                                                        $N = count($product);
                                                        for ($i = 0; $i < $N; $i++) {
                                                            $sql2 = "INSERT INTO purchase_items_list VALUES ('$purchasing_id', '$product[$i]', '$quantity[$i]')";
                                                            $result2 = $conn->query($sql2);
                                                        }

                                                        mysqli_close($conn);
                                                        ?>
                                                        <div>
                                                            <div class="card-body">
                                                            </div>

                                                            <input type="addnew" value="Addnew" class="btn-check" id="addnew" onClick="document.location.href='addnew'" />
                                                            <label class="btn btn-outline-success" for="addnew">Add another data</label>

                                                            <input type="mainn" value="Mainn" class="btn-check" id="mainn" onClick="document.location.href='dashboard'" />
                                                            <label class="btn btn-outline-danger" for="mainn">Back to database</label>
                                                        </div>
                                                    </center>
                                                </tbody>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                          <form  method="post">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Purchasing ID</th>
                                        <th>Supplier ID</th>
                                        <th>Employee ID</th>
                                        <th>Production Date</th>
                                        <th>Shelf Life</th>
                                        <th>Shelf Date</th>
                                        <th>Payment Status</th>
                                        <th>Details</th>
                                        <th>Inbound Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM purchase";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $status = false;
                                                if ($row["inbound_status"] == 1) {
                                                  $status = true;
                                                }

                                                ?><tr>
                                                  <td><input type="checkbox" name="checkbox[]" class="form-check-input" id="checkbox<?php echo $row["purchasing_id"]?>" value="<?php echo $row["purchasing_id"]?>" <?php if($status==true){echo "disabled";}?>>
                                                      <label for="checkbox<?php echo $row["purchasing_id"]?>"></label>
                                                  </td>
                                                  <td><?php echo $row["purchasing_id"]?></td>

                                                <?php
                                                echo "<td>" . $row["supplier_id"] ."</td><td>" . $row["employee_id"] ."</td><td>" . $row["production_date"] ."</td><td>" .$row["shelf_life"] ."</td><td>" .$row["shelf_date"] ."</td><td>" .$row["payment_status"] ."</td>";
                                                ?>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="purchase-info?id=<?php echo $row["purchasing_id"]?>">View</a></td>
                                                <td>
                                                <?php  if ($status==true){ ?>
                                                	 <spam class="badge bg-success" >Confirmed</span>
                                                <?php } else {?>
                                                  <span class="badge bg-danger" >Not Confirmed</span>
                                                <?php } ?>
                                              </td>



                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        echo $purchase_list[0][1];
                                        CloseCon($conn);
                                        ?>

                                    </tbody>

                                </table>
                                <a type="button" class="btn btn-light-success me-1 mb-1" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm Inbound</a>

                                <div class="modal fade text-left modal-borderless" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Inbound Confirmation</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-target="#border-added" method="post">
                                                    <?php include('errors'); ?>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for=inbound_id>Inbound ID:</label>
                                                                <?php
                                                                $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');

                                                                $sql_inbound = "SELECT MAX(inbound_id) FROM inbound";
                                                                $result_inbound = $conn->query($sql_inbound);
                                                                $row_inbound = $result_inbound->fetch_assoc();
                                                                $inbound = (int) $row_inbound["MAX(inbound_id)"];
                                                                $inbound++;
                                                                ?>
                                                                <input type="integer" class="form-control" name="inbound_id" id="inbound_id" value="<?php echo $inbound; ?>" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="employee_id">Employee ID:</label>
                                                                <select name="employee_id" class="form-control form-control-md">
                                                                    <option value="">Select Employee ID</option>
                                                                    <?php
                                                                    $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                    $result0 = $conn->query($sql0);
                                                                    while ($row0 = $result0->fetch_assoc()) {
                                                                    ?>
                                                                        <option value="<?php echo $row0["employee_id"] ?>"><?php echo $row0["firstname"]; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="inbound_date">Inbound date:</label>
                                                                <?php
                                                                date_default_timezone_set('Asia/Hong_Kong');
                                                                $date = date('Y-m-d');
                                                                ?>
                                                                <input type="date" class="form-control" name="inbound_date" id="Inbound date" value="<?php echo $date; ?>" placeholder="">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="inbound_way">Inbound Way:</label>
                                                                <input type="varchar" class="form-control" name="inbound_way" id="Inbound_way" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="inbound_cost">Inbound Cost:</label>
                                                                <input type="integer" class="form-control" name="inbound_cost" id="inbound_cost" placeholder="">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="Submit" class="btn btn-primary me-1 mb-1" name="confirminbound">Confirm</button>
                                                        <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $errors = array();

                                if (isset($_POST['confirminbound'])) {
                                    $conn = mysqli_connect('localhost', 'endurase_sakedb', 'oIx6!!!nZ_do3', 'endurase_sakedb');

                                    $confirm_inbound_id = $_POST["inbound_id"];
                                    $confirm_employee_id = $_POST["employee_id"];
                                    $confirm_inbound_date = $_POST["inbound_date"];
                                    $confirm_inbound_way = $_POST["inbound_way"];
                                    $confirm_inbound_cost = $_POST["inbound_cost"];

                                    $sql = "INSERT INTO inbound VALUES ('$confirm_inbound_id','$confirm_employee_id', '$confirm_inbound_date', '$confirm_inbound_way', '$confirm_inbound_cost')";
                                    $result = $conn->query($sql);

                                    $id = $_POST['checkbox'];
                                    $N = count($id);

                                    for ($i = 0; $i < $N; $i++) {

                                        $sql = "INSERT INTO inbound_items_list VALUES ('$confirm_inbound_id', '$id[$i]')";
                                        $result = $conn->query($sql);

                                        $sql_status = "UPDATE purchase SET inbound_status = '1' WHERE purchasing_id='" . $id[$i] . "'";
                                        $result = $conn->query($sql_status);

                                        $sql_quantity = "SELECT product_id, quantity FROM purchase_items_list where purchasing_id='" . $id[$i] . "'";
                                        $result_quantity = $conn->query($sql_quantity);
                                        while ($row_quantity = $result_quantity->fetch_assoc()) {
                                            $product = $row_quantity["product_id"];
                                            $quantity = $row_quantity["quantity"];
                                            $sql_stock = "SELECT `stock` FROM `stock` WHERE product_id='$product'";
                                            $result_stock = $conn->query($sql_stock);
                                            $row_stock = $result_stock->fetch_assoc();
                                            $stock = $row_stock["stock"];
                                            $newstock = $stock + $quantity;
                                            $sql3 = "UPDATE `stock` SET `stock` = '$newstock' WHERE `stock`.`product_id` = '$product'";
                                            $result3 = $conn->query($sql3);
                                        }
                                    }

                                    header("location: purchase-list");
                                }
                                ?>

                            </form>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; ERP</p>
                    </div>
                    <div class="float-end">
                        <p>Something here</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php include('../footer.php'); ?>

    <script>
        function add() {
            var html = "<th><input type='integer' class='form-control' name='product_id[]'></th>";
            html += "<th><input type='integer' class='form-control' name='quantity[]'></th>";
            var table = document.getElementById("tbody");
            var row = table.insertRow();
            row.innerHTML = html;
        }
    </script>

<?php
    function Scan(){
        
    }
?>

</body>
