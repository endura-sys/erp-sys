<?php include('../header.php'); ?>
<?php $currentPage = 'dashboard'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../template/assets/vendors/jquery/jquery.min.js"></script>
    <script src="../template/assets/js/moment.js"></script>
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.min.css">
    <script src="../template/assets/js/pages/dashboard.js"></script>

</head>

<body>

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">

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

                </div>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <?php
                            date_default_timezone_set('Asia/Hong_Kong');
                            $date = date('Y-m-d');
                            ?>

                            <div class="form-group">
                                <input id="today-date" name="todayDate" type="date" class="form-control" value="<?php echo $date ?>" />
                            </div>

                        </div>
                        <div class="col-12 col-md-8 order-md-5 order-first">
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

                    <script type="text/javascript">
                        $(function() {
                            renderProductTotalDaySale();
                            renderYearGrossProfit();

                            $("#today-date").on('change', function() {
                                renderProductTotalDaySaleOnchange();
                            });
                        });
                    </script>
                    <!-- include get Grap data -->


                    <!-- data in dashboard -->
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
                                                <h6 class="font-extrabold mb-0" id="alipaySale"></h6>
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
                                                <h6 class="font-extrabold mb-0" id="fpsSale">0</h6>
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
                                                <h6 class="font-extrabold mb-0" id="cashSale">0</h6>
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
                                                <h6 class="font-extrabold mb-0" id="totalSale">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Today sales -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Today Sales</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- <div id="chart-profile-visit"></div> -->
                                        <div id="chart-product-day-sale"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Today sales -->

                        <!-- Period Sales -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Period sale</h4>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-3">
                                        <?php
                                        date_default_timezone_set('Asia/Hong_Kong');
                                        $date = date('Y-m-d');
                                        ?>
                                        <div class="form-group">
                                            <input id="today-date" name="todayDate" type="date" class="form-control" value="<?php echo $date ?>" />
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-product-period-sale"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Period Sales -->

                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Period sale</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="area"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Radial Gradient Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="radialGradient"></div>
                                    </div>
                                </div>
                            </div>
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
                        <p>ERP</p>
                    </div>
                </div>


            </footer>
        </div>
    </div>

    <footer>
        <script src="template/assets/vendors/apexcharts/apexcharts.js"></script>
        <script src="../template/assets/js/bootstrap-datetimepicker.js"></script>
        <script src="../template/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../template/assets/js/bootstrap.min.js"></script>
        <script src="../template/assets/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
        <script src="../template/assets/js/pages/ui-apexchart.js"></script>

    </footer>

    <?php include('../footer.php'); ?>
</body>

</html>