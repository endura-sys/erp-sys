<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>

</body>
  
</html>





<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
  </head>
  
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
          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>
              
              <li class="sidebar-item  ">
                <a href="dashboard.php" class='sidebar-link'>
                  <i class="bi bi-grid-fill"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              
              <li class="sidebar-item active has-sub">
                <a href="table-datatable.php" class='sidebar-link'>
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Datatable</span>
                </a>
                
                <ul class="submenu active">
                  <li class="submenu-item ">
                    <a href="datatable-1.php">datatable-1</a>
                  </li>
                  <li class="submenu-item ">
                    <a href="datatable-2.php">datatable-2</a>
                  </li>
                  <li class="submenu-item active">
                    <a href="addnew.php">Add new data</a>
                  </li>
                </ul>
                
              </li>
              
            </ul>
          </div>
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
              </div>
              
              <div class="card-body">
                <tbody>
                  <center>
                    <?php
                      
                      $conn = mysqli_connect("localhost", "root", "root", "db");
                      
                      // Check connection
                      if($conn === false){
                        die("ERROR: Could not connect. " 
                          . mysqli_connect_error());
                      }
                      
                      $no =  $_REQUEST['no'];
                      $status =  $_REQUEST['status'];
                      $p1 = $_REQUEST['p1'];
                      $p2 = $_REQUEST['p2'];
                      $p3 = $_REQUEST['p3'];
                      $stock = $_REQUEST['stock'];
                      $location = $_REQUEST['location'];
                      $sake_brewer = $_REQUEST['sake_brewer'];
                      $name = $_REQUEST['name'];
                      $volume = $_REQUEST['volume'];
                      $unit = $_REQUEST['unit'];
                      
                      
                      // Performing insert query execution
                      $sql = "INSERT INTO data  VALUES ('$no'
                        ,'$status','$p1','$p2','$p3','$stock','$location','$sake_brewer', 
                        '$name','$volume','$unit')";
                      
                      if(mysqli_query($conn, $sql)){
                        echo "<h3>Data stored in a database successfully." 
                        . " Please browse your localhost" 
                        . " to view the updated data</h3>"; 
                        
                        echo nl2br("No : $no\n"
                          . "Status : $status\nP1 : $p1\nP2 : $p2\nP3 : $p3\nStatus : $status\nLocation : $location\nSake brewer : $sake_brewer\nName : $name\nVolume : $volume\nUnit : $unit\n");
                      } else{
                        // echo "ERROR : Invalid input $sql. "
                        // . mysqli_error($conn);
                        echo "ERROR : Invalid input. " 
                        . mysqli_error($conn);
                      }
                      mysqli_close($conn);
                    ?>
                    <div>
                      <div class="card-body">
                      </div>
                      
                      <input type="addnew" value="Addnew" class="btn-check" id="addnew" 
                        onClick="document.location.href='addnew.php'" />
                      <label class="btn btn-outline-success" for="addnew">Add another data</label>
                      
                      <input type="mainn" value="Mainn" class="btn-check" id="mainn" 
                        onClick="document.location.href='datatable-1.php'" />
                      <label class="btn btn-outline-danger" for="mainn">Back to database</label>
                    </div>
                  </center>
                </tbody>
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
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
      // Simple Datatable
      let table1 = document.querySelector('#table1');
      let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    
    <script src="assets/js/main.js"></script>
  </body>
  
</html>