<?php include('../header.php'); ?>
<?php $currentPage = 'user-management';
      $restrict_low_access=true;
 ?>

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
						<div class="row">
							<div class="card-header col-md-6">
								Simple Datatable
							</div>

							<div class="buttons col-md-6 d-flex justify-content-end h-50">
								<a href="create-user" class="btn btn-success">Create a New User</a>
							</div>
						</div>

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        require_once('../../../database.php');
                                        $conn = OpenCon();

                                        $sql = "SELECT employee_id, position_id, firstname, surname, email, active FROM employee";
                                        $result = $conn->query('set names utf8');
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $i=1;
                                            while($row = $result->fetch_assoc()) {
                                              $sql_restrict_user_info="SELECT access_level FROM position WHERE position_id='".$row['position_id']."'";
                                              $result_restrict_user_info = $conn->query($sql_restrict_user_info);
                                              $row_restrict_user_info = $result_restrict_user_info->fetch_assoc();
                                              if($row_access_level_check['access_level']=="Medium" AND ($row_restrict_user_info['access_level']=="High" || $row_restrict_user_info['access_level']=="Medium")){
                                                continue; //Do not show SuperAdmin Info for Corporate Admins
                                              }
                                    ?>
                                                <?php if ($row["active"] == 1) { ?>
                                                <tr>
                                                  <td><?php echo $i; $i++; ?></td>
                                                  <td><?php echo $row["firstname"]; ?></td>
                                                  <td><?php echo $row["surname"]; ?></td>
                                                  <?php
                                                    $sql2 = "SELECT position_name FROM position WHERE position_id = '". $row["position_id"] ."'";
                                                    $result2 = $conn->query($sql2);
                                                    $row2 = $result2->fetch_assoc();
                                                  ?>
                                                  <td><?php echo $row2["position_name"]; ?></td>
                                                  <td><?php echo $row["email"]; ?></td>
                                                  <td><a class="btn btn-primary btn-sm shadow-sm" href="user-update?id=<?php echo $row["employee_id"]?>" >Update</a>

                      														<button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#confirmModal<?php echo $row["employee_id"]?>">
                      															Delete
                      														</button>
                      														<div class="modal fade" id="confirmModal<?php echo $row["employee_id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      															<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                      																<div class="modal-content">
                      																	<div class="modal-header">
                      																		<h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
                      																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      																	</div>
                      																	<div class="modal-body">
                      																		<p>Confirm to delete user <b><?php echo $row["firstname"]; ?></b>?</p>
                      																	</div>
                      																	<div class="modal-footer">
                      																		<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                      																			<i class="bx bx-x d-block d-sm-none"></i>
                      																			<span class="d-none d-sm-block">Close</span>
                      																		</button>

                      																		<form  method="POST">
                      																			<input type="hidden" name="id" value="<?php echo $row['employee_id']; ?>">
                      																			<input type="submit" name="deletebtn" class="btn btn-danger ml-1" value="Delete">
                      																			<i class="bx bx-check d-block d-sm-none"></i>
                      																		</form>
                      																		<?php
                      																			if (isset($_POST["deletebtn"])) {
                      																				$id = $_POST["id"];

                      																				$sql = "UPDATE employee SET active = '0' where employee_id = '$id'";
                      																				$result = $conn->query($sql);

                                                              $sql2 = "DELETE FROM account where employee_id = '$id'";
                      																				$result2 = $conn->query($sql2);

                      																				$message = "User Deleted Successfully";

                      																				header("location: user-management");
                      																			}
                      																		?>
                      																	</div>
                      																</div>
                      															</div>
                      														</div>
                      												</td>
                                            </tr>
                                          <?php } ?>
                                    <?php
                                              //  echo "<tr><td>" .$row["id"] ."</td><td>" .$row["full_name"] ."</td><td>" .$row["position"] ."</td><td>" . $row["email"] ."</td><td>" . $row["phone"] ."</td><td>" . $row["username"] ."</td><td>" .$row["password"] ."</td>";
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
