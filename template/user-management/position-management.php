<?php include('../header.php'); ?>
<?php $currentPage = 'position-management';
      $restrict_low_access=true;
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
								<a href="create-position" class="btn btn-success">Create a New Position</a>
							</div>
						</div>

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Position</th>
                                        <th>Access Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT * FROM position";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $i=1;
                                            while($row = $result->fetch_assoc()) {
                                    ?>
                                              <tr>
                                                <td><?php echo $i; $i++; ?></td>
                                                <td><?php echo $row["position_name"]; ?></td>
                                                <td><?php echo $row["access_level"]; ?></td>
                                                <td><a class="btn btn-primary btn-sm shadow-sm" href="position-update?id=<?php echo $row["position_id"]?>" >Update</a>

														<button type="button" class="btn btn-danger btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#confirmModal<?php echo $row["position_name"]?>">
															Delete
														</button>
														<div class="modal fade" id="confirmModal<?php echo $row["position_name"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalCenterTitle">Confirmation</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		<p>Confirm to delete position <b><?php echo $row["position_name"]; ?></b>?</p>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
																			<i class="bx bx-x d-block d-sm-none"></i>
																			<span class="d-none d-sm-block">Close</span>
																		</button>

																		<form  method="POST">
																			<input type="hidden" name="positiondlt" value="<?php echo $row['position_name']; ?>">
																			<input type="submit" name="deletebtn" class="btn btn-danger ml-1" value="Delete">
																			<i class="bx bx-check d-block d-sm-none"></i>
																		</form>
																		<?php
																			if (isset($_POST["deletebtn"])) {
																				$position = $_POST["positiondlt"];

																				$sql = "DELETE FROM position where position_name = '$position'";
																				$result = $conn->query($sql);

																				$message = "User Deleted Successfully";

																				header("location: position-management");
																			}
																		?>


																	</div>
																</div>
															</div>
														</div>
												</td>
                                              </tr>
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
