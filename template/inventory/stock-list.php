
<?php include('../header.php'); ?>
<?php $currentPage = 'stock-list'; ?>

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
                            <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Stock list</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable
                        </div>

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>Location</th>
                                        <th>Sake Brewer</th>
                                        <th>Volume</th>
                                        <th>Unit</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        $conn = OpenCon();

                                        $sql = "SELECT product_id, p1, p2, p3, location, sake_brewer, name, volume, unit FROM wine_list";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["product_id"] ."</td><td>"
                                                .$row["name"] ."</td><td>"
                                                ."$" .$row["p1"] ."</td><td>"
                                                ."$" .$row["p2"] ."</td><td>"
                                                ."$" .$row["p3"] ."</td><td>"
                                                .$row["location"] ."</td><td>"
                                                .$row["sake_brewer"] ."</td><td>"
                                                .$row["volume"]. "ML" ."</td><td>"
                                                .$row["unit"]. "/ctn" ."</td>";
                                                $sql2 = "SELECT stock FROM stock where product_id ='" . $row["product_id"] ."'";
                                                $result2 = $conn->query($sql2);
                                                $row2 = $result2->fetch_assoc();
                                                echo "<td>" .$row2["stock"] ."</td>";
                                                if($row2["stock"] > 0) { ?>
                                                  <td><span class="badge bg-success" >In stock</span></td>
                                                <?php } else { ?>
                                                  <td><span class="badge bg-danger" >Out of stock</span></td>
                                                <?php }

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
