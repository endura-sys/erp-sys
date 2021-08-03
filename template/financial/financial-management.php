<?php include('../header.php'); ?>
<?php $currentPage = 'financial-management'; ?>
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
                            <h3>Financial Management</h3>
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
                        </div>

                        <div class="card-body">
                          <form  method="post">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Employee ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
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
                                                  <td><?php echo $row["purchasing_id"]?></td>

                                                <?php
                                                echo "<td>" . $row["employee_id"] ."</td><td>" . $row["production_date"] ."</td>";
                                                ?>
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

                                        $sql = "SELECT * FROM sales";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $status = false;
                                                if ($row["is_outbound"] == 1) {
                                                  $status = true;
                                                }

                                                ?><tr>
                                                  <td><?php echo $row["sale_id"]?></td>

                                                <?php
                                                echo "<td>" . $row["employee_id"] ."</td><td>" . $row["sale_id"] ."</td>";
                                                ?>
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

</body>
