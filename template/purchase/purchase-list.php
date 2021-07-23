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

                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal"
                                data-bs-target="#border-add">
                                Add new data
                            </button>
                                <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new data</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-target="#border-added" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="purchasing_id">Purchasing id:</label>
                                                                <input type="integegr" class="form-control" name="purchasing_id" id="Purchasing id" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="product_id">Product id:</label>
                                                                <input type="integer" class="form-control" name="product_id" id="Product id" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="quantity">Quantity:</label>
                                                                <input type="integer" class="form-control" name="quantity" id="Quantity" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="account_payable">Account payable:</label>
                                                                <input type="integer" class="form-control" name="account_payable" id="Account_payable" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="supplier_id">Supplier id:</label>
                                                                <input type="integer" class="form-control" name="supplier_id" id="Supplier id" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="employee_id">Employee id:</label>
                                                                <input type="integer" class="form-control" name="employee_id" id="Employee id" placeholder="">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="production_date">Production date:</label>
                                                                <input type="date" class="form-control" name="production_date" id="Production date" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="purchasing_date">Purchasing date:</label>
                                                                <input type="date" class="form-control" name="purchasing_date" id="Purchasing date" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="shelf_date">Shelf date:</label>
                                                                <input type="date" class="form-control" name="shelf_date" id="Shelf date" placeholder="">
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
                            <div class="modal fade text-left modal-borderless" id="border-added" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new data</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <tbody>
                                                    <center>
                                                        <?php

                                                            $conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                                            // Check connection
                                                            if($conn === false){
                                                                die("ERROR: Could not connect. "
                                                                    . mysqli_connect_error());
                                                            }

                                                            $purchasing_id =  $_REQUEST['purchasing_id'];
                                                            $product_id =  $_REQUEST['product_id'];
                                                            $quantity = $_REQUEST['quantity'];
                                                            $account_payable = $_REQUEST['account_payable'];
                                                            $supplier_id = $_REQUEST['supplier_id'];
                                                            $employee_id = $_REQUEST['employee_id'];
                                                            $production_date = $_REQUEST['production_date'];
                                                            $purchasing_date = $_REQUEST['purchasing_date'];
                                                            $shelf_date = $_REQUEST['shelf_date'];

                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO purchase VALUES ('$purchasing_id', '$account_payable',
                                                            '$supplier_id','$employee_id','$production_date','$purchasing_date','$shelf_date')";

                                                            $sql_puchase_list = "INSERT INTO purchase_list VALUES ('$purchasing_id','$product_id','$quantity')";


                                                            if(mysqli_query($conn, $sql)){
                                                                echo "<h3>Data stored in a database successfully."
                                                                . " Please browse your localhost"
                                                                . " to view the updated data</h3>";

                                                                echo nl2br("Purchasing id : $purchasing_id\n"
                                                                    . "Production id : $product_id\nQuantity : $quantity\nSupplier id : $supplier_id\nEmployee id : $employee_id\nProduction date : $production_date\nPurchasing date : $purchasing_date\nShelf date : $shelf_date");
                                                            } else{
                                                                // echo "ERROR : Invalid input $sql. "
                                                                // . mysqli_error($conn);
                                                                echo "ERROR : Invalid input. "
                                                                . mysqli_error($conn);
                                                            }

                                                            $result_purchase_list=$conn->query($sql_puchase_list);

                                                            mysqli_close($conn);
                                                        ?>
                                                        <div>
                                                            <div class="card-body">
                                                            </div>

                                                            <input type="addnew" value="Addnew" class="btn-check" id="addnew"
                                                                onClick="document.location.href='addnew'" />
                                                            <label class="btn btn-outline-success" for="addnew">Add another data</label>

                                                            <input type="mainn" value="Mainn" class="btn-check" id="mainn"
                                                                onClick="document.location.href='dashboard'" />
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
                                        <th>Purchasing ID</th>
                                        <th>Account Payable</th>
                                        <th>Supplier ID</th>
                                        <th>Employee ID</th>
                                        <th>Production Date</th>
                                        <th>Purchasing Date</th>
                                        <th>Shelf Date</th>
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
                                            while($row = $result->fetch_assoc()) {
                                                $status=false;
                                                $sql_inbound_status = "SELECT purchasing_id FROM inbound_items WHERE purchasing_id= '" . $row["purchasing_id"] . "'  ";
                                                $result_inbound_status=$conn->query($sql_inbound_status);
                                                if($result_inbound_status->num_rows > 0){
                                                  $status=true;
                                                }

                                                ?><tr>
                                                  <td><input type="checkbox" name="checkbox[]" class="form-check-input" id="checkbox<?php echo $row["purchasing_id"]?>" value="<?php echo $row["purchasing_id"]?>" <?php if($status==true){echo disabled;}?>>
                                                      <label for="checkbox<?php echo $row["purchasing_id"]?>"><?php echo $row["purchasing_id"]?></label>
                                                  </td>

                                                <?php
                                                echo "<td>" . $row["account_payable"] ."</td><td>" . $row["supplier_id"] ."</td><td>" . $row["employee_id"] ."</td><td>" . $row["production_date"] ."</td><td>" .$row["purchasing_date"] ."</td><td>" .$row["shelf_date"] ."</td><td>";
                                                ?>
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
                            <a type="button" class="btn btn-light-success me-1 mb-1" data-bs-toggle="modal" data-bs-target="#confirmModal" >Confirm Inbound</a>

                            <div class="modal fade text-left modal-borderless" id="confirmModal" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form data-target="#border-added" method="post">
                                              <?php include ('errors'); ?>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="employee_id">Employee id:</label>
                                                            <input type="integer" class="form-control" name="employee_id" id="Employee id" placeholder="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inbound_date">Inbound date:</label>
                                                            <input type="date" class="form-control" name="inbound_date" id="Inbound date" placeholder="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="shelf_date">Shelf date:</label>
                                                            <input type="date" class="form-control" name="shelf_date" id="Shelf date" placeholder="">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="inbound_way">Inbound Way:</label>
                                                            <input type="Text" class="form-control" name="inbound_way" id="Inbound_way" placeholder="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inbound_cost">Inbound Cost:</label>
                                                            <input type="Text" class="form-control" name="inbound_cost" id="inbound_cost" placeholder="">
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
                                $conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                $confirm_employee_id = $_POST["employee_id"];
                                $confirm_inbound_date = $_POST["inbound_date"];
                                $confirm_shelf_date = $_POST["shelf_date"];
                                $confirm_inbound_way = $_POST["inbound_way"];
                                $confirm_inbound_cost = $_POST["inbound_cost"];

                                $sql = "INSERT INTO inbound (employee_id, inbound_date, shelf_date, inbound_way, inbound_cost) VALUES ('$confirm_employee_id', '$confirm_inbound_date', CURRENT_TIMESTAMP, '$confirm_inbound_way', '$confirm_inbound_cost')";
                                $result = $conn->query($sql);

                                $id=$_POST['checkbox'];
                                $N=count($id);

                                $sql2 = "SELECT MAX(inbound_id) FROM inbound";
                                $result2 = $conn->query($sql2);
                                $row = $result2->fetch_assoc();
                                $in_id = $row["MAX(inbound_id)"];

                                for($i=0; $i<$N; $i++){

                                  $sql7 = "INSERT INTO `inbound_items` (`inbound_id`, `purchasing_id`) VALUES ('$in_id', '$id[$i]')";
                                  $result = $conn->query($sql7);

                                  $sql2 = "SELECT product_id, quantity FROM purchase_list where purchasing_id='". $id[$i] ."'";
                                  $result2 = $conn->query($sql2);
                                  while($row2 = $result2->fetch_assoc()) {
                                    $product = $row2["product_id"];
                                    $quantity = $row2["quantity"];
                                    $sql = "SELECT `stock` FROM `stock_list` WHERE no='$product'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    $stock = $row["stock"];
                                    $newstock = $stock + $quantity;
                                    $sql3 = "UPDATE `stock_list` SET `stock` = '$newstock' WHERE `stock_list`.`no` = '$product'";
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

</body>
