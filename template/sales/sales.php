<?php include ('../header.php'); ?>
<?php include('sales-to-outbound.php'); ?>

<?php $currentPage = 'sales'; ?>

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
                                    <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new sales</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-target="#border-added" method="post">
                                                    <div class="row">

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">

                                                              <?php
                                                                $conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                                                $sql_sale = "SELECT MAX(sale_id) FROM sales";
                                                                $result_sale = $conn->query($sql_sale);
                                                                $row_sale = $result_sale->fetch_assoc();
                                                                $sale = (int) $row_sale["MAX(sale_id)"];
                                                                $sale++;

                                                              ?>

                                                                <label for=sale_id>Sale ID:</label>
                                                                <input type="integer" class="form-control" name="sale_id" value="<?php echo $sale; ?>" required>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="customer_id">Customer ID:</label>
                                                                <select name="customer_id" class="form-control form-control-md" required>
                                                                  <option value="">Select Customer ID</option>
                                                                  <?php
                                                                  $conn = mysqli_connect("localhost", "root", "root", "sakedb");


                                                                  $sql0 = "SELECT customer_id, firstname FROM customer";
                                                                  $result0 = $conn->query($sql0);
                                                                  while($row0 = $result0->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?php echo $row0["customer_id"]?>"><?php echo $row0["firstname"];?></option>

                                                                  <?php
                                                                }

                                                                ?>
                                                                </select>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="employee_id">Employee ID:</label>
                                                                <select name="employee_id" class="form-control form-control-md" required>
                                                                  <option value="">Select Employee ID</option>
                                                                  <?php
                                                                  $conn = mysqli_connect("localhost", "root", "root", "sakedb");


                                                                  $sql0 = "SELECT employee_id, firstname FROM employee";
                                                                  $result0 = $conn->query($sql0);
                                                                  while($row0 = $result0->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?php echo $row0["employee_id"]?>"><?php echo $row0["firstname"];?></option>

                                                                  <?php
                                                                }

                                                                ?>
                                                                </select>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="sale_date">Sale date:</label>
                                                                <input type="date" class="form-control" name="sale_date" required>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="sale_time">Sale time:</label>
                                                                <input type="time" class="form-control" name="sale_time" required>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="payment_method">Payment method:</label>
                                                                <select name="payment_method" class="form-control form-control-md" required>
                                                                  <option value="">Select Payment</option>
                                                                  <option value="cash">Cash</option>
                                                                  <option value="credit card">Credit Card</option>
                                                                  <option value="alipay">Alipay</option>
                                                                  <option value="FPS">FPS</option>
                                                                </select>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="expect_outbound_date">Expect outbound date:</label>
                                                                <input type="date" class="form-control" name="expect_outbound_date" required>
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="form-group">
                                                                <label for="status">Outbound status:</label>
                                                                <select name="status" class="form-control form-control-md" required>
                                                                  <option value="">Select Status</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                      </div>


                                                      <div class=" form-group">
                                                        <table class = "table">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-sm-5 col-md-6">Product ID:</th>
                                                              <th class="col-sm-5 col-md-6">Quantity:</th>
                                                              <th class="col-sm-1 col-md-1"></th>
                                                            </tr>
                                                          </thead>
                                                          <tbody id="tbody">
                                                            <tr>
                                                                <th><input type="integer" class="form-control" name="product_id[]" id="productid" required></th>
                                                                <th><input type="integer" class="form-control" name="quantity[]" required></th>
                                                                <th>
                                                                    <button type="button" class="btn btn-primary" onclick="add(this)">Add</button>
                                                                </th>

                                                                <!-- <th>
                                                                    <button type="button" class="btn btn-danger" onclick="deleterow(this)">
                                                                        <i class="bi bi-x-circle"></i>
                                                                    </button>
                                                                </th> -->

                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </div>

                                                        <div class="d-flex justify-content-end">
                                                              <div class="form-group">
                                                                  <label for="total_sale">Total sale:</label>
                                                                  <input type="varchar" class="form-control" name="total_sale" id="total" value="0" required>
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

                                                            $sale_id =  $_REQUEST['sale_id'];
                                                            $customer_id =  $_REQUEST['customer_id'];
                                                            $employee_id = $_REQUEST['employee_id'];
                                                            $sale_date = $_REQUEST['sale_date'];
                                                            $sale_time = $_REQUEST['sale_time'];
                                                            $payment_method = $_REQUEST['payment_method'];
                                                            $expect_outbound_date = $_REQUEST['expect_outbound_date'];
                                                            $status = $_REQUEST['status'];
                                                            $product = $_REQUEST['product_id'];
                                                            $quantity = $_REQUEST['quantity'];
                                                            $total_sale = $_REQUEST['total_sale'];

                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO sales VALUES ('$sale_id','$customer_id','$employee_id','$sale_date','$sale_time','$payment_method','$total_sale', '$expect_outbound_date','$status')";
                                                            $result = $conn->query($sql);

                                                            $N = count($product);
                                                            for($i = 0; $i < $N; $i++) {
                                                              $sql2 = "INSERT INTO sale_items_list VALUES ('$sale_id', '$product[$i]', '$quantity[$i]')";
                                                              $result2 = $conn->query($sql2);
                                                            }

                                                            // if(mysqli_query($conn, $sql)){
                                                            //   $N = count($product);
                                                            //   for($i = 0; $i < $N; $i++) {
                                                            //     $sql2 = "INSERT INTO sale_items VALUES ('$sale_id', '$product', '$quantity')";
                                                            //     $result2 = $conn->query($sql2);
                                                            //   }
                                                            //
                                                            //     echo "<h3>Data stored in a database successfully."
                                                            //     . " Please browse your localhost"
                                                            //     . " to view the updated data</h3>";
                                                            //
                                                            //     echo nl2br("Sale_id : $sale_id\n"
                                                            //         . "Customer_id : $customer_id\nEmployee_id : $employee_id\nDiscount : $discount\nAccount_receive : $account_receive\nSale_date : $sale_date\nSale_time : $sale_time\nPayment_method : $payment_method");
                                                            // } else{
                                                            //     // echo "ERROR : Invalid input $sql. "
                                                            //     // . mysqli_error($conn);
                                                            //     echo "ERROR : Invalid input. "
                                                            //     . mysqli_error($conn);
                                                            // }
                                                            mysqli_close($conn);
                                                        ?>
                                                        <!-- <div>
                                                            <div class="card-body">
                                                            </div>

                                                            <input type="addnew" value="Addnew" class="btn-check" id="addnew"
                                                                onClick="document.location.href='addnew'" />
                                                            <label class="btn btn-outline-success" for="addnew">Add another data</label>

                                                            <input type="mainn" value="Mainn" class="btn-check" id="mainn"
                                                                onClick="document.location.href='dashboard'" />
                                                            <label class="btn btn-outline-danger" for="mainn">Back to database</label>
                                                        </div> -->
                                                    </center>
                                                </tbody>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                          <form action="sales" method="post">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sale ID</th>
                                        <th>Customer ID</th>
                                        <th>Employee ID</th>
                                        <th>Sale date</th>
                                        <th>Sale time</th>
                                        <th>Payment method</th>
                                        <th>Total sale</th>
                                        <th>Details</th>
                                        <th>Invoice</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM sales";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                $status = false;
                                                if ($row["is_outbound"] == 1) {
                                                  $status = true;
                                                }
                                                ?>
                                                <tr>
                                                  <?php if($status == true) { ?>
                                                    <td><input type="checkbox" name="outbound[]" class="form-check-input" value="<?php echo $row["sale_id"]?>" disabled></td>
                                                    <td><?php echo $row["sale_id"]?></td>
                                                  <?php } else { ?>
                                                    <td><input type="checkbox" name="outbound[]" class="form-check-input" value="<?php echo $row["sale_id"]?>"></td>
                                                    <td><?php echo $row["sale_id"]?></td>
                                                  <?php }
                                                echo "<td>" .$row["customer_id"] ."</td><td>" .$row["employee_id"] ."</td><td>" .$row["sale_date"] ."</td><td>" .$row["sale_time"] ."</td><td>" .$row["payment_method"] ."</td><td>" .$row["total_sale"] ."</td>";
                                                ?>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="order-info?id=<?php echo $row["sale_id"]?>">View</a></td>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="invoice-sales?id=<?php echo $row["sale_id"]?>" target="_blank">Generate</a></td>
                                                <?php
                                                if($status == true) { ?>
                                                  <td><span class="badge bg-success" >Confirmed</span></td>
                                                <?php } else { ?>
                                                  <td><span class="badge bg-danger" >Not Confirmed</span></td>
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
                            <button type="button" name="submitoutbound" class="btn btn-primary btn-md shadow-sm float-lg-end" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm Outbound</button>
                            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalCenterTitle">Outbound Confirmation</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                          <div class="form-group">
                                              <label for=outbound_id>Outbound ID:</label>
                                              <?php
                                              $conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                              $sql_outbound = "SELECT MAX(outbound_id) FROM outbound";
                                              $result_outbound = $conn->query($sql_outbound);
                                              $row_outbound = $result_outbound->fetch_assoc();
                                              $outbound = (int) $row_outbound["MAX(outbound_id)"];
                                              $outbound++;
                                              ?>
                                              <input type="integer" class="form-control" name="outbound_id" id="outbound_id" value="<?php echo $outbound; ?>" placeholder="">
                                          </div>

                                          <div class="form-group">
                                              <label for="employee_id">Employee ID:</label>
                                              <select name="employee_id" class="form-control form-control-md" >
                                                <option value="">Select Employee ID</option>
                                                <?php
                                                $sql0 = "SELECT employee_id, firstname FROM employee";
                                                $result0 = $conn->query($sql0);
                                                while($row0 = $result0->fetch_assoc()) {
                                                  ?>
                                                  <option value="<?php echo $row0["employee_id"]?>"><?php echo $row0["firstname"];?></option>

                                                <?php
                                              }

                                              ?>
                                              </select>
                                          </div>

                                            <div class="form-group">
                                                <label for="outbound_date">Outbound Date</label>
                                                <?php
                                                date_default_timezone_set('Asia/Hong_Kong');
                                                $date = date('Y-m-d');
                                                ?>
                                                <input type="date" class="form-control" name="outbound_date" id="outbound_date" value="<?php echo $date;?>">
                                            </div>


                                          </div>

                                          <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="outbound_way">Outbound Way</label>
                                                <input type="varchar" class="form-control" name="outbound_way" id="outbound_way">
                                            </div>

                                            <div class="form-group">
                                                <label for="outbound_cost">Outbound Cost</label>
                                                <input type="varchar" class="form-control" name="outbound_cost" id="outbound_cost">
                                            </div>

                                        </div>
                                    </div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
																			<i class="bx bx-x d-block d-sm-none"></i>
																			<span class="d-none d-sm-block">Close</span>
																		</button>

																			<button type="submit" name="confirmoutbound" class="btn btn-primary ml-1" value="Confirm">Confirm</button>
																			<i class="bx bx-check d-block d-sm-none"></i>

																	</div>
																</div>
															</div>
														</div>

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

  <script>
    $(function add(btn) {
      var product = btn.parentNode.previousElementSibling.previousElementSibling.firstElementChild.value;
      var quantity = btn.parentNode.previousElementSibling.firstElementChild.value;
      btn.className = "btn btn-danger";
      btn.innerHTML = "Remove";
      btn.onclick = function() {return deleterow(this)};

      var html = "<th><input type='integer' class='form-control' name='product_id[]' required></th>";
      html += "<th><input type='integer' class='form-control' name='quantity[]' required></th>";
      html += "<th><button type='button' class='btn btn-primary' onclick='add(this)'>Add</button></th>";

      var table = document.getElementById("tbody");
      var row = table.insertRow();
      row.innerHTML = html;
      $.ajax({
          url: "getTotal",
          method: "POST",
          data:{ productid: product},
          success:function(response){
              response = parseInt(response);
              var total = parseInt(document.getElementById("total").value);
              total += response * quantity;
              document.getElementById("total").value = total;

          }
      });
      // if (product != "" && quantity != "") {
      //   $.ajax({
      //       url:'getTotal',
      //       method:'POST',
      //       data:{
      //           productid: product,
      //       },
      //       success:function(response){
      //           alert(response);
      //           document.getElementById("total").value = response;
      //
      //       }
      //   });
        // document.getElementById("total").value += product * quantity;
        // btn.className = "btn btn-danger";
        // btn.innerHTML = "Remove";
        // btn.onclick = function() {return deleterow(this)};
        //
        // var html = "<th><input type='integer' class='form-control' name='product_id[]' required></th>";
        // html += "<th><input type='integer' class='form-control' name='quantity[]' required></th>";
        // html += "<th><button type='button' class='btn btn-primary' onclick='add(this)'>Add</button></th>";
        //
        // var table = document.getElementById("tbody");
        // var row = table.insertRow();
        // row.innerHTML = html;
      // }
    }
  </script>

  <script>
    function deleterow(btn) {
      var table = document.getElementById("tbody");
      var i = btn.parentNode.parentNode.rowIndex;
      table.deleteRow(i-1);
    }
  </script>

  <!-- <script>
    function calculate() {
      var quantity = document.getElementById("q").value;
      var product = document.getElementById("p").value;
      if (product != "")
        document.getElementById("total").value = product * quantity;
    }
  </script> -->

</body>

</html>
