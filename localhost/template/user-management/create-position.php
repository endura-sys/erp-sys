<?php include('../header.php');
      // initializing variables
      $position = "";

      // connect to the database
      include '../../database.php';
      $conn = OpenCon();

      if (isset($_POST["submitbtn"])) {

        $position = $_POST["position"];;

        if (empty($position)) { array_push($errors, "Job Position is required."); }

        $sql = "SELECT * from job_position where position = '$position'";
        $result = $conn->query($sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
          array_push($errors, "Username already exists. Please create a new username.");
        }

        if (count($errors) == 0) {

          $sql = "INSERT INTO job_position (position) VALUES('$position')";
          $result = $conn->query($sql);

          header("location: position-management");
        }
      }

      CloseCon($conn);
      ?>

<!DOCTYPE html>
<html lang="en">

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
						<h3>Create a New Position</h3>
						<p class="text-subtitle text-muted">Input the required information</p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<div class="buttons d-flex justify-content-end h-70">
							<a href="position-management" class="btn btn-primary">Back</a>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Position Information</h4>
					</div>
					<div class="card-content">
						<div class="card-body">
							<form class="form form-horizontal" action="create-position" method="post">
								<?php include ('errors.php'); ?>
								<div class="form-body">
									<div class="row">
										<div class="col-md-4">
											<label>Job Position</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="text" class="form-control form-control-xl" name="position" placeholder="Job Position" value=<?php echo $position; ?>>
												<div class="form-control-icon">
													<i class="bi bi-briefcase"></i>
												</div>
											</div>
										</div>
										<div class="col-sm-12 d-flex justify-content-end">
											<button type="submit" class="btn btn-primary me-1 mb-1" name="submitbtn">Create</button>
											<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
										</div>
									</div>
								</div>
							</form>
						</div>
                    </div>
                </div>
            </div>
			<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
	<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>