<?php include ('../header.php');
      $restrict_low_access=true;

include '../../database.php';
$conn = OpenCon();

$position = "";
$errors = array();
if (isset($_POST['updatebtn'])) {
    $position = $_POST["position"];

    if (empty($position)) { array_push($errors, "Job Position is required."); }

    $sql_check = "SELECT * from position where position_name = '$position'";
    $result_check = $conn->query($sql_check);
    $num_check = mysqli_num_rows($result_check);

    $result_check = mysqli_query($conn,"SELECT * FROM position WHERE position_id ='" . $_GET['id'] . "'");
    $row_check= mysqli_fetch_array($result_check);

    if($row_check['position']!=$position){
      if ($num_check > 0) {
        array_push($errors, "Position already exists. Please create a new position.");
      }
    }

    if (count($errors) == 0) {
      if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE position set position_name ='" . $_POST['position'] . "' WHERE position_id ='" . $_GET['id'] . "'");
        $message = "Record Modified Successfully";
      }
    }

}
$result = mysqli_query($conn,"SELECT * FROM position WHERE position_id ='" . $_GET['id'] . "'");
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
                    <h3>Update Position: "<?php echo $row['position_name']?>"</h3>
                    <p class="text-subtitle text-muted">Type the information you want to update</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                    <div class="buttons d-flex justify-content-end h-70">
                      <a href="position-management" class="btn btn-primary">Back</a>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">"<?php echo $row['position_name']?>" Information</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="position-update?id=<?php echo $row['position_id']?>" method="post">
                        <?php if(isset($message)) { ?>
                        <div class="alert alert-success">
                          <i class="bi bi-check-circle"></i>
                          <?echo $message; } ?>
                        </div>
                        <?php include ('errors.php'); ?>
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label>Job Position</label>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group position-relative has-icon-left mb-4">
                                <input type="hidden" class="form-control form-control-xl" name="old_position" value="<?php echo $row['position_name']?>">
                                <input type="text" class="form-control form-control-xl" name="position" value="<?php echo $row['position_name']?>">
                                <div class="form-control-icon">
                                  <i class="bi bi-briefcase"></i>
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
