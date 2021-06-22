<?php include('../header.php'); ?>
<?php $currentPage = 'dashboard'; ?>

<?php
  session_start();

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login");
  }
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <div class="header">
	<h2>Home Page</h2>
</div>

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
                <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <!-- logged in user information -->
                    <?php  if (isset($_SESSION['username'])) : ?>
                      <h2>Welcome <strong><?php
                      $db=mysqli_connect('localhost', 'root', 'root', 'db');
                      $u=$_SESSION['username'];
                      $query = "SELECT full_name FROM users where username='$u'";
                      if ($result = mysqli_query($db, $query)) {
                        $obj=$result-> fetch_object();
                        echo $obj->full_name;
                      }
                      ?></strong></h2>
                      <?php else: ?>
                      <!-- <h3>You need Log In</h3> -->
                    <?php endif ?>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <div class="container">
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Random Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Another Page</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
              </div>
            </div>
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
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            
                            <!-- Content Row -->
                            <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border shadow h-100 py-2">

                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Earnings (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,0000</div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (annual) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Earnings (Annual)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,0000</div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- purchasing Requests Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Requests of purchase</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <!-- Content Row -->

                            <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                            </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                        <iframe width="600" height="475" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTl3XiKTtaUkV6M-awGPFq6ogoLjoLtaLjZ7_UPp_EKwjhH8eeqkuerDMtgkLytHK0hTRmoetcSTUB7/pubchart?oid=943475450&amp;format=interactive"></iframe>
                                        </div>
                                    </div>
                                        </div>
                                </div>
                            </div>

                            <!-- list -->
                            <div class="col-xl-12 col-lg-8">
                                <div class="card shadow mb-8">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Out of stock</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <table class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>商品名稱</th>
                                                <th>地域</th>
                                                <th>蔵元</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                                <!-- Connect to the database -->
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