<?php include ('../header.php'); ?>
<?php
include '../../database.php';
$conn = OpenCon();
if(count($_POST)>0) {
  mysqli_query($conn,"UPDATE users set id='" . $_POST['id'] . "', full_name='" . $_POST['full_name'] . "', position='" . $_POST['position'] . "' , email='" . $_POST['email'] . "' , username='" . $_POST['username'] . "' , password='" . $_POST['password'] . "' WHERE id='" . $_POST['id'] . "'");
  //mysqli_query($conn,"UPDATE users set id='" . $_POST['id'] . "', full_name='" . $_POST['full_name'] . "', last_name='" . $_POST['last_name'] . "', city_name='" . $_POST['city_name'] . "' ,email='" . $_POST['email'] . "' WHERE id='" . $_POST['userid'] . "'");
  $message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
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
                    <h3>Update username: "<?php echo $row['username']?>" information</h3>
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
                    <h4 class="card-title">"<?php echo $row['username']?>" Information</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="user-update?id=<?php echo $row["id"]?>" method="post">
                        <?php if(isset($message)) { ?>
                        <div class="alert alert-success">
                          <i class="bi bi-check-circle"></i>
                          <?echo $message; } ?>
                        </div>
                        <?php include ('errors.php'); ?>
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label> Full Name</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="hidden" class="form-control form-control-xl" name="id" value="<?php echo $row['id']?>">
                                <input type="text" class="form-control form-control-xl" name="full_name" value="<?php echo $row['full_name']?>">
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
                                <input type="text" class="form-control form-control-xl" name="position" value="<?php echo $row['position']?>">
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
                                <input type="email" class="form-control form-control-xl" name="email" value="<?php echo $row['email']?>">
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
                                <input type="text" class="form-control form-control-xl" name="phone" value="<?php echo $row['phone']?>">
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
                                <input type="text" class="form-control form-control-xl" name="username" value="<?php echo $row['username']?>">
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
                                <input type="text" class="form-control form-control-xl" name="password" value="<?php echo $row['password']?>">
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
                                <input type="text" class="form-control form-control-xl" name="confirmpassword" value="<?php echo $row['password']?>">
                                <div class="form-control-icon">
                                  <i class="bi bi-shield-lock"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button type="submit" type="Submit" class="btn btn-primary me-1 mb-1" name="submit">Update</button>
                              <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                          </div>
                        </div>
                        <?php CloseCon($conn);?>
                      </form>
                    </div>
                            </div>
                        </div>
                    </div>
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
