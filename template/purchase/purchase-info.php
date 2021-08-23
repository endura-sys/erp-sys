<?php include('../header.php'); ?>
<?php include('purchase-to-inbound.php'); ?>
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
            						<h3>Purchase Order No: <?php echo $_GET['id'] ?></h3>
            						<p class="text-subtitle text-muted">Details</p>
            					</div>
            					<div class="col-12 col-md-6 order-md-2 order-first">
            						<div class="buttons d-flex justify-content-end h-70">
            							<a href="purchase-list" class="btn btn-primary">Back</a>
            						</div>
            					</div>
            				</div>
                </div>

                <section class="section">
                    <div class="card">
							          <div class="card-header">Scan</div>

                       
                    <div class="card-header">
                    <form method="post" name="yundanForm" οnsubmit='lost()'> 
                    <div class= "container">
                    <div class="form-group">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-sm-6 col-md-6">Quantity:</th>
                                                                    <th class="col-sm-6 col-md-6">Product ID:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody">
                                                                <tr>
                                                                    <th>
                                                                    <input type="integer" class="form-control block float-start float-lg-end" name="quantityscan" id="quantityscan" onkeyup='saveValue(this);'/>
                                                                    </th>

                                                                    <th>
                                                                    <input type="integer" class="form-control block float-start float-lg-end" name="danhao" id="danhao"/>
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                       
         
                            <div ><input class="btn btn-outline-primary block float-start float-lg-end"  type="reset" value="reset" name="button"/></div>
                            <div ><input class="btn btn-outline-primary block float-start float-lg-end"  type="submit" value="submit" name="submit"/>  </div>
                       
                    </div>

    
 <script type="text/javascript">
        document.getElementById("quantityscan").value = getSavedValue("quantityscan");    // set the value to this input
        // document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "10";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>

<?php 




@$purchase = $_GET['id'];
// echo $purchase;
@$danhao = $_POST['danhao'];  
@$quantityscan = $_POST['quantityscan'];



$today = date("Y-m-d");  

@$sqlselect = "SELECT * from `sakedb`.`purchase_items_list` where (purchasing_id = '$purchase' AND product_id = '$danhao')";
// @$sqlinsert = "INSERT INTO `sakedb`.`purchase_items_list`(num) VALUES('$danhao')";
// $selecttoday = "select `num` from `yundan` where `time` LIKE '%$today%'";
// $counttoday = "select count(*) from `testphp`.`yundan` where `time` LIKE '%$today%'"; 
$conn=mysqli_connect("localhost","root","root", "sakedb");
 
$my_db = mysqli_select_db($sakedb,$conn);   
$selectnum = mysqli_query($conn,$sqlselect); 
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



if(!empty($danhao)) { 
    if (mysqli_num_rows($selectnum)) {  
        echo "<br>\n";
        echo "<br>\n";  
        echo "<br>\n";
        echo "Items：$danhao has already confirmed\n";
        $sql_oldq = "SELECT `num` from `sakedb`.`purchase_items_list` where (purchasing_id = '$purchase' AND product_id = '$danhao')";
        $result_oldq = $conn->query($sql_oldq);
        $row_oldq = $result_oldq->fetch_assoc();
        $oldq = $row_oldq["num"];
        $quan = $oldq + $quantityscan;
        $sql = "UPDATE purchase_items_list SET num = '$quan' WHERE (purchasing_id = '$purchase' AND product_id = '$danhao')";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully\n";
          } else {
            echo "Error updating record1: " . mysqli_error($conn);
          }
        $sql_stock = "SELECT `stock` from `sakedb`.`stock` where product_id = '$danhao'"; 
        $result_stock = $conn->query($sql_stock);
        $row_stock = $result_stock->fetch_assoc();
        $stockold = $row_stock["stock"];
        $stocknew = $stockold + $quantityscan;
        $sql2 = "UPDATE stock SET stock = '$stocknew' WHERE product_id = '$danhao'";
        mysqli_query($conn, $sql2);
        //     echo "Record updated successfully\n";
        //   } else {
        //     echo "Error updating record1: " . mysqli_error($conn);
        //   } 
} else {
        // $insertnum = mysqli_query($conn,$sqlinsert);
        echo "<br>\n";
        echo "<br>\n";
        echo "<br>\n";
        echo "<br>Items：$danhao doesn't exist<br>\n";   
        // $sql = "UPDATE purchase_items_list SET num = '$quantity' WHERE (purchasing_id = '$purchase' AND product_id = '$danhao')";
        // if (mysqli_query($conn, $sql)) {
        //     echo "Record updated successfully";
        //   } else {
        //     echo "Error updating record2: " . mysqli_error($conn);
        //   }
        }
    }

// print_r($_POST)
 
// $totaltotal = mysqli_fetch_array(mysqli_query($conn,$counttoday));
// $yundannum = mysqli_query($conn,$selecttoday);
 
// echo "<br>\n";
// echo "<br>\n";
// echo "<br>\n"; 
// echo "Total Today: $totaltotal[0]<br>\n";
 
// while($echonum = mysqli_fetch_array($yundannum)){  
//     echo $echonum['num'];
//     echo "<br>\n";
// }
mysqli_close($conn); 
?>
<script type="text/javascript"> 
document.getElementById ('danhao').focus(); 
function lost(){
document.getElementById ('danhao').blur();  
}
</script>


                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Purchase ID</th>
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

                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM `purchase_items_list` where purchasing_id='" . $_GET['id'] . "'";
                                        $result = $conn->query($sql);

                                        $product_list = array();
                                        // $sql4 = "SELECT num FROM purchase_items_list where ( purchasing_id = $purchase )";
                                        // $result4 = $conn->query($sql4);
                                        // $row4 = $result4->fetch_assoc();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                $sql2 = "SELECT name, p2 FROM `wine_list` where product_id='". $row['product_id'] ."'";
                                            		$result2 = $conn->query($sql2);
                                                while($row2 = $result2->fetch_assoc()) {
                                                  $sql3 = "SELECT stock FROM stock where product_id ='" . $row["product_id"] ."'";
                                                  $result3 = $conn->query($sql3);
                                                //   $sql4 = "SELECT num FROM purchase_items_list where product_id='". $row['product_id'] ."'";
                                                //   $result4 = $conn->query($sql4);
                                                  
                                                  while($row3 = $result3->fetch_assoc()) {
                                                    echo "<tr><td>" .$row["purchasing_id"] ."</td><td>" .$row["product_id"] ."</td><td>" .$row2["name"] ."</td><td>$" .$row2["p2"] ."</td><td>" .$row["quantity"] ."</td><td>" .$row3["stock"] ."</td>";
                                                    // echo $row["num"];
                                                    
                                                    // echo $row["quantity"]. "<br>";
                                                    if($row["quantity"] < $row["num"]) { ?>
                                                      <td><span class="badge bg-danger">toomuch</span></td>
                                                    <?php } 
                                                    elseif ($row["quantity"] == $row["num"]){ ?>
                                                      <td><span class="badge bg-success">confirmed</span></td>
                                                    <?php }
                                                    else{?>
                                                    <td><span class="badge bg-danger">Not confirmed</span></td>
                                                  <?php 
                                                    }

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

                            <button type="button" name="submitinbound" class="btn btn-primary btn-md shadow-sm float-lg-end" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm Inbound</button>
                            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
								<div class="modal-content">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Inbound Confirmation</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
																
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                          <div class="form-group">
                                              <label for=inbound_id>Inbound ID:</label>
                                              <?php
                                              $conn = mysqli_connect("localhost", "root", "root", "sakedb");

                                              $sql_inbound = "SELECT MAX(inbound_id) FROM inbound";
                                              $result_inbound = $conn->query($sql_inbound);
                                              $row_inbound = $result_inbound->fetch_assoc();
                                              $inbound = (int) $row_inbound["MAX(inbound_id)"];
                                              $inbound++;
                                              ?>
                                              <input type="integer" class="form-control" name="inbound_id" id="inbound_id" value="<?php echo $inbound; ?>" placeholder="">
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
                                                <label for="inbound_date">Inbound Date</label>
                                                <input type="date" class="form-control" name="inbound_date" id="inbound_date" value="<?php echo $saledate;?>">
                                            </div>


                                          </div>

                                          <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="inbound_way">Inbound Way</label>
                                                <input type="varchar" class="form-control" name="inbound_way" id="inbound_way">
                                            </div>

                                            <div class="form-group">
                                                <label for="inbound_cost">Inbound Cost</label>
                                                <input type="varchar" class="form-control" name="inbound_cost" id="inbound_cost">
                                            </div>

                                            
                                        </div>
                                    </div>
								</div>

								<div class="modal-footer">
								<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
								    <i class="bx bx-x d-block d-sm-none"></i>
								    <span class="d-none d-sm-block">Close</span>
								</button>

								<button type="submit" name="confirminbound" class="btn btn-primary ml-1" value="confirminbound">Confirm</button>
								    <i class="bx bx-check d-block d-sm-none"></i>

												</div>
								            </div>
								        </div>
								    </div>


                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; ERP</p>
                        <?php  
                                                $inbound_id = $_POST["inbound_id"];
                                                $employee_id = $_POST["employee_id"];
                                                $inbounddate = $_POST["inbound_date"];
                                                $inboundway = $_POST["inbound_way"];
                                                $inboundcost = $_POST["inbound_cost"];
                                                echo $inbound_id, $employee_id, $inbounddate,$inboundway,$inboundcost;
                                                echo "hello";
                                            
                                            ?>
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
