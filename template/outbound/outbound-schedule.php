<?php include('../header.php'); ?>
<?php $currentPage = 'outbound-schedule'; ?>

<html>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                

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
                            <h3>Outbound Schedule</h3>
                            <p class="text-subtitle text-muted">For user to check outbound schedule</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Outbound</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Outbound Table
                        
                        <?php
                        $conn = OpenCon();
                                $user = $_SESSION['username'];
                                                            // echo $user;
                                                            $sql = " SELECT position.access_level
                                                            from employee
                                                            INNER JOIN account ON employee.employee_id = account.employee_id
                                                            INNER JOIN position ON position.position_id = employee.position_id
                                                            WHERE account.username = '$user'";
                                                            $result_level = $conn->query($sql);
                                                            $row_level = $result_level->fetch_assoc();
                                                            // echo $row_level["access_level"];
                                                            
                                                            ?>
                                                            
                            <?php if ($row_level["access_level"] == "High") { ?>
                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal"
                                data-bs-target="#border-add">
                                Add new data
                            </button> <?php } ?>

                            <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new sales</h5>
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
                                                            $conn = OpenCon();

                                                            $sql_outbound = "SELECT MAX(outbound_id) FROM outbound";
                                                            $result_outbound = $conn->query($sql_outbound);
                                                            $row_outbound = $result_outbound->fetch_assoc();
                                                            $outbound = (int) $row_outbound["MAX(outbound_id)"];
                                                            $outbound++;

                                                            ?>
                                                                <label for="outbound_id">outbound id:</label>
                                                                <input type="integer" class="form-control" name="outbound_id" id="Inbound id" value="<?php echo $outbound; ?>" placeholder="">
                                                            </div>                     
                                                        </div>

                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="purchasing_id">Purchasing id:</label>
                                                                <select name="purchasing_id" class="form-control form-control-md">
                                                                <option value="">Select purchasing_id</option>
                                                                <?php
                                                                $conn = OpenCon();


                                                                $sql0 = "SELECT purchasing_id FROM purchase";
                                                                $result0 = $conn->query($sql0);
                                                                while ($row0 = $result0->fetch_assoc()) {
                                                                ?>
                                                                    <option value="<?php echo $row0["purchasing_id"] ?>"><?php echo $row0["purchasing_id"]; ?></option>

                                                                <?php
                                                                }

                                                                ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                        

                                                        <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="employee_id">Employee id:</label>
                                                                <select name="employee_id" class="form-control form-control-md">
                                                                    <option value="">Select Employee ID</option>
                                                                    <?php
                                                                    $conn = OpenCon();


                                                                    $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                    $result0 = $conn->query($sql0);
                                                                    while ($row0 = $result0->fetch_assoc()) {
                                                                    ?>
                                                                        <option value="<?php echo $row0["employee_id"] ?>"><?php echo $row0["firstname"]; ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                     


                                                       
                                                <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="outbound_date">Outbound date:</label>
                                                                <input type="date" class="form-control" name="outbound_date" id="Outbound date" placeholder="">
                                                            </div>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="shelf_date">Shelf date:</label>
                                                                <input type="date" class="form-control" name="shelf_date" id="Shelf date" placeholder="">
                                                            </div>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="outbound_way">Shipping way:</label>
                                                                <input type="varchar" class="form-control" name="outbound_way" id="Shipping way" placeholder="">
                                                            </div>
                                                </div>

                                                <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="outbound_cost">Shipping cost:</label>
                                                                <input type="integer" class="form-control" name="outbound_cost" id="Shipping cost" placeholder="">
                                                            </div>
                                                        </div>
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
                                                                        <input type="integer" class="form-control" name="product_id">
                                                                    </th>

                                                                    <th>
                                                                        <input type="integer" class="form-control" name="quantity">
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

                                                            $conn = OpenCon();

                                                            // Check connection
                                                            if($conn === false){
                                                                die("ERROR: Could not connect. "
                                                                    . mysqli_connect_error());
                                                            }

                                                            $outbound_id = $_REQUEST['outbound_id'];
                                                            $purchasing_id =  $_REQUEST['purchasing_id'];
                                                            $product_id =  $_REQUEST['product_id'];
                                                            $quantity = $_REQUEST['quantity'];
                                                            $employee_id = $_REQUEST['employee_id'];
                                                            $outbound_date = $_REQUEST['outbound_date'];
                                                            $shelf_date = $_REQUEST['shelf_date'];
                                                            $outbound_way = $_REQUEST['outbound_way'];
                                                            $outbound_cost = $_REQUEST['outbound_cost'];

                                                            echo '$outbound_id','$employee_id','$outbound_date',
                                                            '$outbound_way','$outbound_cost';
                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO outbound VALUES ('$outbound_id','$employee_id','$outbound_date',
                                                            '$outbound_way','$outbound_cost')";

                                                            if(mysqli_query($conn, $sql)){
                                                                echo "<h3>Data stored in a database successfully."
                                                                . " Please browse your localhost"
                                                                . " to view the updated data</h3>";

                                                                echo nl2br("Outbound id : $outbound_id\n"
                                                                    . "Purchasing id : $purchasing_id\nProduct id : $product_id\nQuantity : $quantity\nEmployee id : $employee_id\nOutbound date : $outbound_date\nShelf date : $shelf_date\nShipping way : $outbound_way\nShipping cost : $outbound_cost\n");
                                                            } else{
                                                                // echo "ERROR : Invalid input $sql. "
                                                                // . mysqli_error($conn);
                                                                echo "ERROR : Invalid input. "
                                                                . mysqli_error($conn);
                                                            }
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
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Outbound ID</th>
                                        <th>Employee ID</th>
                                        <th>Outbound Date</th>
                                        <th>Outbound Way</th>
                                        <th>Outbound Cost</th>
                                        <th>Details</th>
                                        <th>Invoice</th>
                                        <?php if ($row_level["access_level"] == "High") { ?>
                                        <th>Action</th> <?php } ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        require_once('../../database.php');
                                        $conn = OpenCon();

                                        $sql = "SELECT outbound_id, employee_id, outbound_date, outbound_way, outbound_cost FROM outbound";
                                        $result = $conn->query('set names utf8');
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["outbound_id"] ."</td><td>" . $row["employee_id"] ."</td><td>" . $row["outbound_date"] ."</td><td>" . $row["outbound_way"] ."</td><td>" .$row["outbound_cost"] ."</td>";
                                                ?>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="outbound-info?id=<?php echo $row["outbound_id"]?>">View</a></td>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="invoice-outbound?id=<?php echo $row["outbound_id"]?>" target="_blank">Generate</a></td>
                                                <?php if ($row_level["access_level"] == "High") { ?>
                                                <td><button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row["outbound_id"]?>">Update</button>
<div class="modal fade text-left modal-borderless" id="updateModal<?php echo $row["outbound_id"]?>" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="update-list" method="post">
                    <div class="row">

  

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Employee ID:</label>
                                <input type="hidden" name="outbound" value="<?php echo $row['outbound_id']; ?>">
                                <input type="integer" class="form-control" name="updateemployee_id" id="name" value="<?php echo $row["employee_id"]?>">
                          </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Inbound Date:</label>
                                <input type="integer" class="form-control" name="updateoutbound_date" id="email" value="<?php echo $row["outbound_date"]?>">
                          </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_date">Inbound Way:</label>
                                <input type="integer" class="form-control" name="updateoutbound_way" id="email" value="<?php echo $row["outbound_way"]?>">
                          </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_time">Inbound Cost:</label>
                                <input type="integer" class="form-control" name="updateoutbound_cost" id="email" value="<?php echo $row["outbound_cost"]?>">
                          </div>
                        </div>


                    <div class="modal-footer">
                        <button type="submit" type="Submit" class="btn btn-primary me-1 mb-1" name="updateoutbound">Update</button>
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
</td> <?php } ?>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        echo $product_list[0][1];
                                        CloseCon($conn);
                                    ?>


                                </tbody>

                            </table>
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
</body>

</html>
