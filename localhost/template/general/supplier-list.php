<?php include('../header.php'); ?>
<?php $currentPage = 'supplier-list'; ?>

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
                            <h3>DataTable</h3>
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
                                                                <label for="supplier_id">Supplier id:</label>
                                                                <input type="integer" class="form-control" name="supplier_id" id="Supplier_id" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="product_id">Product id:</label>
                                                                <input type="varchar" class="form-control" name="product_id" id="Product_id" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="supplier_name">Supplier name:</label>
                                                                <input type="varchar" class="form-control" name="supplier_name" id="Supplier_name" placeholder="">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label for="supplier_phone">Supplier phone:</label>
                                                                <input type="varchar" class="form-control" name="supplier_phone" id="Supplier_phone" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="supplier_email">Supplier email:</label>
                                                                <input type="varchar" class="form-control" name="supplier_email" id="Supplier_email" placeholder="">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="supplier_address">Supplier address:</label>
                                                                <input type="varchar" class="form-control" name="supplier_address" id="Supplier_address" placeholder="">
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

                                                            $supplier_id =  $_REQUEST['supplier_id'];
                                                            $product_id =  $_REQUEST['product_id'];
                                                            $supplier_name = $_REQUEST['supplier_name'];
                                                            $supplier_phone = $_REQUEST['supplier_phone'];
                                                            $supplier_email = $_REQUEST['supplier_email'];
                                                            $supplier_address = $_REQUEST['supplier_address'];

                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO supplier  VALUES ('$supplier_id'
                                                                ,'$product_id','$supplier_name','$supplier_phone','$supplier_email','$supplier_address')";

                                                            if(mysqli_query($conn, $sql)){
                                                                echo "<h3>Data stored in a database successfully."
                                                                . " Please browse your localhost"
                                                                . " to view the updated data</h3>";

                                                                echo nl2br("No : $no\n"
                                                                    . "Status : $status\nP1 : $p1\nP2 : $p2\nP3 : $p3\nStatus : $status\nLocation : $location\nSake brewer : $sake_brewer\nName : $name\nVolume : $volume\nUnit : $unit\n");
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
                                        <th>供應商編號</th>
                                        <th>商品編號</th>
                                        <th>供應商姓名</th>
                                        <th>聯絡電話</th>
                                        <th>聯絡電郵</th>
                                        <th>聯絡地址</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT supplier_id, product_id, supplier_name, supplier_phone, supplier_email, supplier_address FROM supplier";
                                        $result = $conn->query($sql);

                                        $supplier_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["supplier_id"] ."</td><td>" .$row["product_id"] ."</td><td>" .$row["supplier_name"] ."</td><td>" . $row["supplier_phone"] ."</td><td>".$row["supplier_email"] ."</td><td>" .$row["supplier_address"] ."</td><td>" ."</td>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        echo $supplier_list[0][1];
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
