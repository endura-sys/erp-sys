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

                <div class="form-group">
                  <div class="row">
                      <label>Type</label>
                      <select class="choices form-select multiple-remove" id="selectType" multiple="multiple">
                          <!-- <optgroup label="Type"> -->
                              <option value="purchase">Purchase</option>
                              <option value="sales">Sales</option>
                          <!-- </optgroup> -->
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                      <label>Employee</label>
                      <select class="choices form-select multiple-remove" multiple="multiple">
                          <?php
                              include '../../database.php';
                              $conn = OpenCon();

                              $sql0 = "SELECT * FROM employee";
                              $result0 = $conn->query($sql0);

                              $id = array();
                              $name = array();

                              while($row0 = $result0->fetch_assoc()) {
                                array_push($id, $row0["employee_id"]);
                                array_push($name, $row0["firstname"]);
                              }

                              $n = count($id);

                              for($i = 0; $i < $n; $i++) {
                                ?>
                                <option value="<?php echo $id[$i] ?>"><?php echo $name[$i] ?></option>
                                <?php
                              }
                          ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                      <label>Status</label>
                      <select class="choices form-select multiple-remove" multiple="multiple">
                        <option value="confirmed">Confirmed</option>
                        <option value="not_confirmed">Not confirmed</option>
                      </select>
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
                                        <th>Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        // include '../../database.php';
                                        // $conn = OpenCon();

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
                                                <td>Purchase</td>
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
                                                echo "<td>" . $row["employee_id"] ."</td><td>" . $row["sale_date"] ."</td>";
                                                ?>
                                                <td>Sales</td>
                                                <td>
                                                <?php if ($status==true){ ?>
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

    <script src="../template/assets/vendors/jquery/jquery.min.js"></script>
    <script src="template/assets/js/ddtf.js"></script>


    <script>
      $("#table1").ddTableFilter();
      // var $ = jQuery;
      $(document).ready(function() {
        var n = 0;
        $("#selectType").on('change', function() {
            var type = $("#selectType").val();
            console.log(type);


            $.ajax({
              url: "getType",
              method: "POST",
              data: { n: n, type: type, },
              success: function(response) {
                console.log(response);
              }
            });
            n++;
        });
      });
    </script>

</body>
