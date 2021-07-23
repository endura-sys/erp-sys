<?php include('../header.php');
      include ('userserver.php');
      include "database.php";
      $conn0=OpenCon();
      $sql0 = "SELECT position_name FROM position";
      $result0 = $conn0->query($sql0);
      $position_list = array();
      $i=0;
      while($row0 = $result0->fetch_assoc()){
        $position_list[$i]=$row0['position_name'];
        $i++;
      }
      $arrlength = count($position_list);
      CloseCon($conn0);

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
						<h3>Create a New User</h3>
						<p class="text-subtitle text-muted">Input the required information</p>
					</div>
					<div class="col-12 col-md-6 order-md-2 order-first">
						<div class="buttons d-flex justify-content-end h-70">
							<a href="user-management" class="btn btn-primary">Back</a>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">User Information</h4>
					</div>
					<div class="card-content">
						<div class="card-body">
							<form class="form form-horizontal" action="create-user" method="post">
								<?php include ('errors.php'); ?>
								<div class="form-body">
									<div class="row">
										<div class="col-md-4">
											<label>First Name</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="text" class="form-control form-control-xl" name="firstname" placeholder="First Name" value=<?php echo $firstname; ?>>
												<div class="form-control-icon">
													<i class="bi bi-person"></i>
												</div>
											</div>
										</div>
                    <div class="col-md-4">
											<label>Surname</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="text" class="form-control form-control-xl" name="surname" placeholder="Surname" value=<?php echo $surname; ?>>
												<div class="form-control-icon">
													<i class="bi bi-person"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Job Position</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<!-- <input type="text" class="form-control form-control-xl" name="position" placeholder="Job Position" value=<?php echo $position; ?>> -->
                        <select name="position" class="form-control form-control-xl" >
                          <option value="">Select Position
                            <?php
                            $conn = mysqli_connect("localhost", "root", "root", "sakedb");


                            $sql0 = "SELECT position_id, position_name FROM position";
                            $result0 = $conn->query($sql0);
                            while($row0 = $result0->fetch_assoc()) {
                              ?>
                              <option value="<?php echo $row0["position_id"]?>"><?php echo $row0["position_name"];?></option>
                          <?php
                          }
                          ?>
                        </select>

												<div class="form-control-icon">
													<i class="bi bi-briefcase"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Email</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="email" class="form-control form-control-xl" name="email" placeholder="Email" value=<?php echo $email; ?>>
												<div class="form-control-icon">
													<i class="bi bi-envelope"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Username</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="text" class="form-control form-control-xl" name="username" placeholder="Username" value=<?php echo $user; ?>>
												<div class="form-control-icon">
													<i class="bi bi-person"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Password</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
												<div class="form-control-icon">
													<i class="bi bi-shield-lock"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Enter Password Again</label>
										</div>
										<div class="col-md-8">
											<div class="form-group position-relative has-icon-left mb-4">
												<input type="password" class="form-control form-control-xl" name="confirmpassword" placeholder="Confirm Password">
												<div class="form-control-icon">
													<i class="bi bi-shield-lock"></i>
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
