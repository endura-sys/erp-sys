<?php include('../header.php'); ?>
<?php include ('userserver.php') ?>

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
                    <h3>Update user "..." information</h3>
                    <p class="text-subtitle text-muted">Type the information you want to update</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="buttons d-flex justify-content-end h-70">
                      <a href="user-management.php" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">User "..." Information</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="create.php" method="post">
                        <?php include ('errors.php'); ?>
                        <div class="form-body">
                          <div class="row">
                            <?php $conn = OpenCon();
                              $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
                              $row= mysqli_fetch_array($result);
                            ?>
                            <div class="col-md-4">
                              <label> Full Name</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" name="fullname" value="Full Name" value=<?php echo $fullname; ?>>
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
                                <input type="text" class="form-control form-control-xl" name="position" value="Job Position" value=<?php echo $position; ?>>
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
                                <input type="email" class="form-control form-control-xl" name="email" value="Email" value=<?php echo $email; ?>>
                                <div class="form-control-icon">
                                  <i class="bi bi-envelope"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label>Phone</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" name="phone" value="Phone" value=<?php echo $phone; ?>>
                                <div class="form-control-icon">
                                  <i class="bi bi-telephone"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label>Username</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" name="username" value="Username" value=<?php echo $user; ?>>
                                <div class="form-control-icon">
                                  <i class="bi bi-person"></i>
                                </div>
                              </div>
                            </div>
                            <?php CloseCon($conn);?>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-primary me-1 mb-1" name="submitbtn">Update</button>
                              <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                            </div>
                        </div>
                    </div>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Update user ... details</h3>
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

                        <form name="frmUser" method="post" action="">
                          <div><?php if(isset($message)) { echo $message; } ?>
                          </div>
                          <div style="padding-bottom:5px;">
                          <a href="user-management">Back to Previous</a>
                          </div>
                          Username: <br>
                            <input type="text" class="form-control form-control-m" value="Password">
                          <!-- <input type="hidden" name="userid" class="txtField" value="<?php echo $row['userid']; ?>">
                          <input type="text" name="userid"  value="<?php echo $row['userid']; ?>"> -->
                          <br>
                          First Name: <br>
                          <input type="text" class="form-control form-control-m" value="Password">
                          <!-- <input type="text" name="first_name" class="txtField" value="<?php echo $row['first_name']; ?>"> -->
                          <br>
                          Last Name :<br>
                          <input type="text" class="form-control form-control-m" value="Password">
                          <!-- <input type="text" name="last_name" class="txtField" value="<?php echo $row['last_name']; ?>"> -->
                          <br>
                          City:<br>
                          <input type="text" class="form-control form-control-m" value="Password">
                          <!-- <input type="text" name="city_name" class="txtField" value="<?php echo $row['city_name']; ?>"> -->
                          <br>
                          Email:<br>
                          <input type="text" class="form-control form-control-m" value="Password">
                          <!-- <input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>"> -->
                          <br>
                          <input type="submit" name="submit" value="Submit" class="buttom">

                        </form>
                        <div class="card-body">

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
