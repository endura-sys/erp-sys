<?php include('../header.php'); ?>

<html>

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
            						<h3>Sales Order No: <?php echo $_GET['id'] ?></h3>
            						<p class="text-subtitle text-muted">Details</p>
            					</div>
            					<div class="col-12 col-md-6 order-md-2 order-first">
            						<div class="buttons d-flex justify-content-end h-70">
            							<a href="sales" class="btn btn-primary">Back</a>
            						</div>
            					</div>
            				</div>
                </div>

                <section class="section">
                    <div class="card">
							          <div class="card-header">Simple Datatable</div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Sale ID</th>
                                        <th>Items ID</th>
                                        <th>Items Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM `sale_items` where sale_id='" . $_GET['id'] . "'";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                $sql2 = "SELECT name, p2 FROM `wine_list` where no='". $row['product_id'] ."'";
                                            		$result2 = $conn->query($sql2);
                                                while($row2 = $result2->fetch_assoc()) {
                                                  $sql3 = "SELECT stock FROM stock_list where no ='" . $row["product_id"] ."'";
                                                  $result3 = $conn->query($sql3);
                                                  while($row3 = $result3->fetch_assoc()) {
                                                    echo "<tr><td>" .$row["sale_id"] ."</td><td>" .$row["product_id"] ."</td><td>" .$row2["name"] ."</td><td>$" .$row2["p2"] ."</td><td>" .$row["quantity"] ."</td><td>" .$row3["stock"] ."</td>";
                                                    if($row["quantity"] > $row3["stock"]) { ?>
                                                      <td><span class="badge bg-danger" >Out of stock</span></td>
                                                    <?php } else { ?>
                                                      <td><span class="badge bg-success" >Ready</span></td>
                                                    <?php }
                                                  }
                                                }
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

</html>
