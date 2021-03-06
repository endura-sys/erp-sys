<?php include('../header.php'); ?>
<?php $currentPage = 'inbound-list'; ?>

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
                            <h3>Inbound List</h3>
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
                                                                <label for="inbound_id">Inbound id:</label>
                                                                <input type="integer" class="form-control" name="inbound_id" id="Inbound id" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="purchasing_id">Purchasing id:</label>
                                                                <input type="integer" class="form-control" name="purchasing_id" id="Purchasing id" placeholder="">
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
                                                                <label for="employee_id">Employee id:</label>
                                                                <input type="integer" class="form-control" name="employee_id" id="Employee id" placeholder="">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="inbound_date">Inbound date:</label>
                                                                <input type="date" class="form-control" name="inbound_date" id="Inbound date" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="shelf_date">Shelf date:</label>
                                                                <input type="date" class="form-control" name="shelf_date" id="Shelf date" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="inbound_way">Shipping way:</label>
                                                                <input type="varchar" class="form-control" name="inbound_way" id="Shipping way" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="inbound_cost">Shipping cost:</label>
                                                                <input type="integer" class="form-control" name="inbound_cost" id="Shipping cost" placeholder="">
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

                                                            $inbound_id = $_REQUEST['inbound_id'];
                                                            $purchasing_id =  $_REQUEST['purchasing_id'];
                                                            $product_id =  $_REQUEST['product_id'];
                                                            $quantity = $_REQUEST['quantity'];
                                                            $employee_id = $_REQUEST['employee_id'];
                                                            $inbound_date = $_REQUEST['inbound_date'];
                                                            $shelf_date = $_REQUEST['shelf_date'];
                                                            $inbound_way = $_REQUEST['inbound_way'];
                                                            $inbound_cost = $_REQUEST['inbound_cost'];

                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO inbound VALUES ('$inbound_id','$purchasing_id','$product_id','$quantity',
                                                            '$employee_id','$inbound_date','$shelf_date',
                                                            '$inbound_way','$inbound_cost')";

                                                            if(mysqli_query($conn, $sql)){
                                                                echo "<h3>Data stored in a database successfully."
                                                                . " Please browse your localhost"
                                                                . " to view the updated data</h3>";

                                                                echo nl2br("Inbound id : $inbound_id\n"
                                                                    . "Purchasing id : $purchasing_id\nProduct id : $product_id\nQuantity : $quantity\nEmployee id : $employee_id\nInbound date : $inbound_date\nShelf date : $shelf_date\nShipping way : $inbound_way\nShipping cost : $inbound_cost\n");
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
                                        <th>Inbound ID</th>
                                        <th>Employee ID</th>
                                        <th>Inbound Date</th>
                                        <th>Inbound Way</th>
                                        <th>Inbound Cost</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM inbound";
                                        $result = $conn->query($sql);

                                        $inbound_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["inbound_id"]. "</td><td>" . $row["employee_id"] ."</td><td>" . $row["inbound_date"] ."</td><td>" .$row["inbound_way"] ."</td><td>" .$row["inbound_cost"] ."</td>";
                                                ?>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="inbound-info?id=<?php echo $row["inbound_id"]?>">View</a></td>
                                                <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        echo $inbound_list[0][1];
                                        CloseCon($conn);
                                    ?>


                                </tbody>

                            </table>
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
