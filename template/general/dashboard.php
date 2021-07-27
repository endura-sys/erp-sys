<?php include('../header.php'); ?>
<?php $currentPage = 'dashboard'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../template/assets/vendors/jquery/jquery.min.js"></script>
    <script src="../template/assets/js/moment.js"></script>
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.min.css">
</head>

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
                        <?php if (isset($_SESSION['username'])) : ?>
                            <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
                        <?php else : ?>
                            <!-- <h3>You need Log In</h3> -->
                        <?php endif ?>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">

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









                <section class="row">

                    <!-- Date picker -->
                    <div class="col-6 col-lg-3 col-md-3">
                        <script type="text/javascript">
                            $(function() {
                                $('#datetimepicker').datetimepicker({
                                    format: 'dd-mm-yyyy',
                                    defaultDate: new Date(),
                                    todayBtn: true,
                                    minView: 2,
                                    pickTime: false,
                                    language: 'zh-CN'
                                });
                            });
                        </script>
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker">
                                <input id="today-date" type="text" class="form-control" value="<?php echo date('d-m-Y') ?>" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                <!-- <button class="btn" id="submit">Submit</button> -->
                            </div>
                        </div>
                    </div>
                    <!-- Date picker -->

                    <!-- include get Grap data -->
                    <?php include('getGraphData/getGraphData.php'); ?>
                    <script>
                        $(function() {
                            $("#today-date").on('change', function() {
                                var x = $('#today-date').val();
                                // var date321 = document.getElementById("today-date").value;
                                $.ajax({
                                    type: 'post',
                                    //url: base_url,
                                    success: function(x) {
                                        var x = $('#today-date').val();
                                        console.log(x);
                                    }
                                });
                            });
                        });
                    </script>
                    <!-- <script>
                        var x = document.getElementById("date").value;
                        console.log(x);
                    </script> -->
                    <!-- include get Grap data -->


                    <!-- Date picker -->
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Alipay</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">FPS</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Cash</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-primary" width="32" height="32" fill="blue" style="width:10px">
                                                        <use xlink:href="template/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32" fill="blue" style="width:10px">
                                                        <use xlink:href="template/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-danger" width="32" height="32" fill="blue" style="width:10px">
                                                        <use xlink:href="template/assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Wow amazing design! Can you make another
                                                                tutorial for
                                                                this design?</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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

                <!-- Passing the graph value to js -->
                <?php $testArray = [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]; ?>

                <script type="text/javascript">
                    var testArray = <?php echo json_encode($testArray); ?>;
                </script>

                <script src="template/assets/vendors/apexcharts/apexcharts.js"></script>
                <script src="template/assets/js/pages/dashboard.js"></script>
                <!-- Passing the graph value to js -->

                <script>
                    n = new Date();
                    y = n.getFullYear();
                    m = n.getMonth() + 1;
                    d = n.getDate();
                    // document.getElementById("date").value = d + "-" + m + "-" + y;
                </script>

            </footer>
        </div>
    </div>

    <footer>
        <script src="../template/assets/js/bootstrap-datetimepicker.js"></script>
        <script src="../template/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../template/assets/js/bootstrap.min.js"></script>
        <script src="../template/assets/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>"></script>





    </footer>

    <?php include('../footer.php'); ?>
</body>

</html>