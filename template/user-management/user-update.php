<?php include ('../header.php'); ?>
<?php
$restrict_low_access=true;
include '../../database.php';
$conn = OpenCon();


$username = "";
$firstname = "";
$surname = "";
$position = "";
$email = "";
$user = "";
$errors = array();
if (isset($_POST['updatebtn'])) {
    $firstname = $_POST["firstname"];
    $surname = $_POST["surname"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $user = $_POST["username"];
    $pw = $_POST["password"];
    $pw2 = $_POST["confirmpassword"];

    if (empty($firstname)) { array_push($errors, "First name is required."); }
    if (empty($surname)) { array_push($errors, "Surname is required."); }
    if (empty($position)) { array_push($errors, "Job Position is required."); }
    if (empty($email)) { array_push($errors, "Email is required."); }
    if (empty($user)) { array_push($errors, "Username is required."); }
    if (empty($pw)) { array_push($errors, "Password is required."); }
    if (strlen($pw)<8) {array_push($errors, "The password must contain at least 8 characters.");}
    if (empty($pw2)) { array_push($errors, "Please enter password again."); }
    else if ($pw != $pw2) { array_push($errors, "Passwords do not match."); }

    $sql_check = "SELECT * from account where username = '$user'";
    $result_check = $conn->query($sql_check);
    $num_check = mysqli_num_rows($result_check);

    $result2 = mysqli_query($conn,"SELECT * FROM account WHERE employee_id='" . $_GET['id'] . "'");
    $row2= mysqli_fetch_array($result2);

    if($row2['username']!=$user){
      if ($num_check > 0) {
        array_push($errors, "Username already exists. Please create a new username.");
      }
    }

    if (count($errors) == 0) {
      if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE employee set firstname='" . $_POST['firstname'] ."', surname='" . $_POST['surname'] . "',
          position_id='" . $_POST['position'] . "' , email='" . $_POST['email']."' WHERE employee_id='" . $_POST['id'] . "'");
        mysqli_query($conn,"UPDATE account set username='" . $_POST['username'] ."', password='" . $_POST['password'] . "' WHERE employee_id='" . $_POST['id'] . "'");
        $message = "Record Modified Successfully";
      }
    }

}
$result = mysqli_query($conn,"SELECT * FROM employee WHERE employee_id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
$result2 = mysqli_query($conn,"SELECT * FROM account WHERE employee_id='" . $_GET['id'] . "'");
$row2= mysqli_fetch_array($result2);


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
                    <h3>Update information for username: "<?php echo $row2['username']?>"</h3>
                    <p class="text-subtitle text-muted">Type the information you want to update</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="buttons d-flex justify-content-end h-70">
                      <a href="user-management" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">"<?php echo $row2['username']?>" Information</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="user-update?id=<?php echo $row["employee_id"]?>" method="post">
                        <?php if(isset($message)) { ?>
                        <div class="alert alert-success">
                          <i class="bi bi-check-circle"></i>
                          <?echo $message; } ?>
                        </div>
                        <?php include ('errors.php'); ?>
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label>First Name</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="hidden" class="form-control form-control-xl" name="id" value="<?php echo $row['employee_id']?>">
                                <input type="text" class="form-control form-control-xl" name="firstname" value="<?php echo $row['firstname']?>">
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
                                <input type="hidden" class="form-control form-control-xl" name="id" value="<?php echo $row['employee_id']?>">
                                <input type="text" class="form-control form-control-xl" name="surname" value="<?php echo $row['surname']?>">
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
                                <!-- <input type="text" class="form-control form-control-xl" name="position" value="<?php echo $row['position']?>"> -->
                                <select name="position" class="form-control form-control-xl" placeholder="Select Position">
                                  <?php
                                    $sql_pos="SELECT position_name FROM position WHERE position_id= '" . $row['position_id']. "'";
                                    $result_pos = $conn->query($sql_pos);
                                    $row_pos = $result_pos->fetch_assoc();
                                  ?>
                                  <option value="<?php echo $row['position_id']?>"><?php echo $row_pos['position_name']?></option>
                                  <?php $sql0 = "SELECT position_id, position_name FROM position";
                                        $result0 = $conn->query($sql0);

                                        $product_list0 = array();
                                        while($row0 = $result0->fetch_assoc()) {
                                          if($row['position_id']!=$row0['position_id']){
                                  ?>
                                          <option value="<?php echo $row0['position_id']?>"><?php echo $row0['position_name']?></option>
                                  <?php
                                          }
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
                                <input type="email" class="form-control form-control-xl" name="email" value="<?php echo $row['email']?>">
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
                                <input type="text" class="form-control form-control-xl" name="username" value="<?php echo $row2['username']?>">
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
                                <input type="password" class="form-control form-control-xl" name="password" value="<?php echo $row2['password']?>">
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
                                <input type="password" class="form-control form-control-xl" name="confirmpassword" value="<?php echo $row2['password']?>">
                                <div class="form-control-icon">
                                  <i class="bi bi-shield-lock"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button type="submit" type="Submit" class="btn btn-primary me-1 mb-1" name="updatebtn">Update</button>
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
