<?php include('../header.php'); ?>

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
                        <h3>Outbound Order No: <?php echo $_GET['id'] ?></h3>
            						<p class="text-subtitle text-muted">Details</p>
            					</div>
            					<div class="col-12 col-md-6 order-md-2 order-first">
            						<div class="buttons d-flex justify-content-end h-70">
            							<a href="outbound-schedule" class="btn btn-primary">Back</a>
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
                                      
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        require_once('../../database.php');
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM `outbound_items_list` where outbound_id='" . $_GET['id'] . "'";
                                        $result = $conn->query('set names utf8');
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                $sql2 = "SELECT product_id, quantity FROM `sale_items_list` where sale_id='". $row['sale_id'] ."'";
                                                $result2 = $conn->query($sql2);
                                                while($row2 = $result2->fetch_assoc()) {
                                              		$sql3 = "SELECT name, volume, p2 FROM `wine_list` where product_id='". $row2['product_id'] ."'";
                                              		$result3 = $conn->query($sql3);
                                              		while($row3 = $result3->fetch_assoc()) {
                                                    echo "<tr><td>" .$row["sale_id"] ."</td><td>" .$row2["product_id"] ."</td><td>" .$row3["name"] ."</td><td>$" .$row3["p2"] ."</td><td>" .$row2["quantity"] ."</td>";
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