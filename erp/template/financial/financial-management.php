<?php include('../header.php'); ?>
<?php $currentPage = 'financial-management'; ?>
<?php

?>

<link rel="stylesheet" href="template/assets/css/Filter.css">

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
                                    <li class="breadcrumb-item active" aria-current="page">Financial management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- <div class="form-group">
                  <div class="row">
                      <label>Type</label>
                      <select class="choices form-select multiple-remove" id="selectType" multiple="multiple">
                          <optgroup label="Type">
                              <option value="purchase" href="#" onclick="$('.table').tableFilter('filterRows', 'purchase')">Purchase</option>
                              <option value="sales" href="#" onclick="$('.table').tableFilter('filterRows', 'sales')">Sales</option>
                          </optgroup>
                      </select>
                  </div>
                </div> -->


                <!-- <div class="form-group">
                  <div class="row">
                      <label>Status</label>
                      <select class="choices form-select multiple-remove" multiple="multiple">
                        <option value="confirmed" href="#" onclick="$('.table').tableFilter('filterRows', 'Confirmed')">Confirmed</option>
                        <option value="not_confirmed" href="#" onclick="$('.table').tableFilter('filterRows', 'Not confirmed')">Not confirmed</option>
                      </select>
                  </div>
                </div>

                <div>
                  <a cla="btn btn-primary" herf="#" onclick="$('.table').tableFilter('filterRows', 'sales')">Sales</a>
                </div>
                <div>
                  <a cla="btn btn-primary" herf="#" onclick="$('.table').tableFilter('filterRows', 'Not confirmed')">Not confirmed</a>
                </div> -->




                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable
                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#expense-add">
                                + Expense
                            </button>

                            <div class="modal fade text-left modal-borderless" id="expense-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new expense</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form data-target="#expense-added" method="post">
                                                <div class="row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-3">Type:</th>
                                                                <th class="col-md-3">Name:</th>
                                                                <th class="col-md-2">Date:</th>
                                                                <th class="col-md-2">Employee:</th>
                                                                <th class="col-md-2">Amount:</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="expense_body">
                                                            <tr>
                                                                <?php
                                                                date_default_timezone_set('Asia/Hong_Kong');
                                                                $saledate = date('Y-m-d');

                                                                require_once('../../database.php');
                                                                $conn = OpenCon();

                                                                $sql_exp = "SELECT * FROM expense_type";
                                                                $result_exp = $conn->query($sql_exp);
                                                                $exp_id = array();
                                                                $exp = array();
                                                                while($row_exp = $result_exp->fetch_assoc()) {
                                                                  array_push($exp_id, $row_exp["expense_id"]);
                                                                  array_push($exp, $row_exp["expense_name"]);
                                                                }
                                                                $n_exp = count($exp);

                                                                $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                $result0 = $conn->query($sql0);
                                                                $employee_id = array();
                                                                $employee_name = array();
                                                                while ($row0 = $result0->fetch_assoc()) {
                                                                  array_push($employee_id, $row0["employee_id"]);
                                                                  array_push($employee_name, $row0["firstname"]);
                                                                }
                                                                $n = count($employee_id);
                                                                ?>
                                                                <th><select class="form-control" name="exp_type[]">
                                                                      <option value="">Select Type</option>
                                                                        <?php for($i = 0; $i < $n_exp; $i++) { ?>
                                                                          <option value="<?php echo $exp_id[$i]?>"><?php echo $exp[$i];?></option>
                                                                        <?php }  ?>
                                                                    </select>
                                                                </th>
                                                                <th><input type="varchar" class="form-control" name="exp_name[]"></th>
                                                                <th><input type="date" class="form-control" name="exp_date[]" value="<?php echo $saledate ?>"></th>
                                                                <th><select class="form-control" name="exp_employee[]">
                                                                      <option value="">Select Employee</option>
                                                                        <?php for($i = 0; $i < $n; $i++) { ?>
                                                                          <option value="<?php echo $employee_id[$i]?>"><?php echo $employee_name[$i];?></option>
                                                                        <?php }  ?>
                                                                    </select>
                                                                </th>
                                                                <th><input type="integer" class="form-control" name="exp_amount[]"></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary" onclick="expense_add()">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <form data-target="#expense-added" method="post">
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

                            <div class="modal fade text-left modal-borderless" id="expense-added" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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

                                                        $exp_type = $_REQUEST['exp_type'];
                                                        $exp_name = $_REQUEST['exp_name'];
                                                        $exp_date = $_REQUEST['exp_date'];
                                                        $exp_employee = $_REQUEST['exp_employee'];
                                                        $exp_amount = $_REQUEST['exp_amount'];

                                                        $N = count($exp_type);
                                                        for ($i = 0; $i < $N; $i++) {
                                                            // Performing insert query execution
                                                            // $product++;
                                                            $sql = "INSERT INTO finance VALUES ('expense', '$exp_type[$i]','$exp_name[$i]','$exp_date[$i]',
                                                                  '$exp_employee[$i]','$exp_amount[$i]')";
                                                            $result = $conn->query($sql);
                                                        }

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


                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#revenue-add">
                                + Revenue
                            </button>

                            <div class="modal fade text-left modal-borderless" id="revenue-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new revenue</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form data-target="#revenue-added" method="post">
                                                <div class="row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-3">Type:</th>
                                                                <th class="col-md-3">Name:</th>
                                                                <th class="col-md-2">Date:</th>
                                                                <th class="col-md-2">Employee:</th>
                                                                <th class="col-md-2">Amount:</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="revenue_body">
                                                            <tr>
                                                                <?php
                                                                date_default_timezone_set('Asia/Hong_Kong');
                                                                $saledate = date('Y-m-d');

                                                                $sql_rev = "SELECT * FROM revenue_type";
                                                                $result_rev = $conn->query($sql_rev);
                                                                $rev_id = array();
                                                                $rev = array();
                                                                while($row_rev = $result_rev->fetch_assoc()) {
                                                                  array_push($rev_id, $row_rev["revenue_id"]);
                                                                  array_push($rev, $row_rev["revenue_name"]);
                                                                }
                                                                $n_rev = count($rev);

                                                                $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                $result0 = $conn->query($sql0);
                                                                $employee_id = array();
                                                                $employee_name = array();
                                                                while ($row0 = $result0->fetch_assoc()) {
                                                                  array_push($employee_id, $row0["employee_id"]);
                                                                  array_push($employee_name, $row0["firstname"]);
                                                                }
                                                                $n = count($employee_id);
                                                                ?>

                                                                <th><select class="form-control" name="rev_type[]">
                                                                      <option value="">Select Type</option>
                                                                        <?php for($i = 0; $i < $n_rev; $i++) { ?>
                                                                          <option value="<?php echo $rev_id[$i]?>"><?php echo $rev[$i];?></option>
                                                                        <?php }  ?>
                                                                    </select>
                                                                </th>
                                                                <th><input type="varchar" class="form-control" name="rev_name[]"></th>
                                                                <th><input type="date" class="form-control" name="rev_date[]" value="<?php echo $saledate ?>"></th>
                                                                <th><select class="form-control" name="rev_employee[]">
                                                                      <option value="">Select Employee</option>
                                                                        <?php for($i = 0; $i < $n; $i++) { ?>
                                                                          <option value="<?php echo $employee_id[$i]?>"><?php echo $employee_name[$i];?></option>
                                                                        <?php }  ?>
                                                                    </select>
                                                                </th>
                                                                <th><input type="integer" class="form-control" name="rev_amount[]"></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary" onclick="revenue_add()">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <form data-target="#revenue-added" method="post">
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

                            <div class="modal fade text-left modal-borderless" id="revenue-added" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
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

                                                        $rev_type = $_REQUEST['rev_type'];
                                                        $rev_name = $_REQUEST['rev_name'];
                                                        $rev_date = $_REQUEST['rev_date'];
                                                        $rev_employee = $_REQUEST['rev_employee'];
                                                        $rev_amount = $_REQUEST['rev_amount'];

                                                        $rev_N = count($rev_type);
                                                        for ($i = 0; $i < $rev_N; $i++) {
                                                            // Performing insert query execution
                                                            // $product++;
                                                            $sql = "INSERT INTO finance VALUES ('revenue', '$rev_type[$i]','$rev_name[$i]','$rev_date[$i]',
                                                                  '$rev_employee[$i]','$rev_amount[$i]')";
                                                            $result = $conn->query($sql);
                                                        }

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
                                    <tr class="filters">
                                        <th>Order ID</th>
                                        <th>Employee</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        // require_once('../../database.php');
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
                                                $sql_employee = "SELECT firstname FROM employee WHERE employee_id = '". $row["employee_id"]. "'";
                                                $result_employee = $conn->query($sql_employee);
                                                while ($row_employee = $result_employee->fetch_assoc()) {
                                                  echo "<td>" . $row_employee["firstname"] ."</td><td>" . $row["production_date"] ."</td>";
                                                }
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
                                                $sql_employee = "SELECT firstname FROM employee WHERE employee_id = '". $row["employee_id"]. "'";
                                                $result_employee = $conn->query($sql_employee);
                                                while ($row_employee = $result_employee->fetch_assoc()) {
                                                  echo "<td>" . $row_employee["firstname"] ."</td><td>" . $row["sale_date"] ."</td>";
                                                }
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
    </script>

    <script>
        function expense_add() {
            var html = "<th><select class='form-control' name='exp_type[]'><option value=''>Select Type</option><?php for($i = 0; $i < $n_exp; $i++) { ?> <option value='<?php echo $exp_id[$i]?>'><?php echo $exp[$i]?></option><?php } ?></select></th>"
            html += "<th><input type='varchar' class='form-control' name='exp_name[]'></th>";
            html += "<th><input type='date' class='form-control' name='exp_date[]' value='<?php echo $saledate ?>'></th>";
            html += "<th><select class='form-control' name='exp_employee[]'><option value=''>Select Employee</option><?php for($i = 0; $i < $n; $i++) { ?> <option value='<?php echo $employee_id[$i]?>'><?php echo $employee_name[$i]?></option><?php } ?></select></th>";
            html += "<th><input type='integer' class='form-control' name='exp_amount[]'></th>";
            var table = document.getElementById("expense_body");
            var row = table.insertRow();
            row.innerHTML = html;
        }
    </script>

    <script>
        function revenue_add() {
            var html = "<th><select class='form-control' name='rev_type[]'><option value=''>Select Type</option><?php for($i = 0; $i < $n_rev; $i++) { ?> <option value='<?php echo $rev[$i]?>'><?php echo $rev[$i]?></option><?php } ?></select></th>"
            html += "<th><input type='varchar' class='form-control' name='rev_name[]'></th>";
            html += "<th><input type='date' class='form-control' name='rev_date[]' value='<?php echo $saledate ?>'></th>";
            html += "<th><select class='form-control' name='rev_employee[]'><option value=''>Select Employee</option><?php for($i = 0; $i < $n; $i++) { ?> <option value='<?php echo $employee_id[$i]?>'><?php echo $employee_name[$i]?></option><?php } ?></select></th>";
            html += "<th><input type='integer' class='form-control' name='rev_amount[]'></th>";
            var table = document.getElementById("revenue_body");
            var row = table.insertRow();
            row.innerHTML = html;
        }
    </script>

    <!-- <script>
      $('table').tableFilter();
    </script> -->

    <!-- <script>
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
    </script> -->

</body>
