<?php include('../header.php'); ?>
<?php $currentPage = 'dashboard'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../template/assets/vendors/jquery/jquery.min.js"></script>
    <script src="../template/assets/js/moment.js"></script>
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="../template/assets/css/bootstrap-datetimepicker.min.css">
    <script src="../template/general/getData/globalData.js"></script>
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
                    <div class="col-12 col-md-6 order-md-2 order-first">

                    </div>
                </div>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">

                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <!-- <h3>DataTable</h3>
                            <p class="text-subtitle text-muted">For user to check they list</p> -->
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
                        <?php
                        date_default_timezone_set('Asia/Hong_Kong');
                        $date = date('Y-m-d');
                        ?>
                        <div class="form-group">
                            <input id="today-date" name="todayDate" type="date" class="form-control" value="<?php echo $date ?>" />
                        </div>
                    </div>
                    <!-- Date picker -->

                    <!-- Get array value from getTodaySale.php -->
                    <script>
                        <?php $productSalesAmount = [100, 20, 30, 20, 10]; ?>



                        $(function() {

                            var optionsProductTotalSale = {
                                annotations: {
                                    position: 'back'
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                chart: {
                                    type: 'bar',
                                    height: 300
                                },
                                fill: {
                                    opacity: 1
                                },
                                plotOptions: {

                                },
                                series: [{
                                    name: 'sales',
                                    data: [0, 0, 0, 0, 0]
                                }],
                                colors: '#435ebe',
                                xaxis: {
                                    categories: ["1", "2", "3", "4", "5"],
                                },
                            }
                            // console.log(productSale);
                            var chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-total-sale"), optionsProductTotalSale);
                            chartProductTotalSale.render();


                            var date = $('#today-date').val();

                            $.ajax({
                                url: 'getTodaySale',
                                method: 'POST',
                                data: {
                                    todayDate: date,
                                },
                                success: function(response) {

                                    // alert(response);

                                    // const result = response.split(",");

                                    var result = JSON.parse(response);
                                    for (var i = 0, emp; i < result.length; i++) {
                                        emp = result[i];
                                        // console.log(emp);
                                    }
                                    document.getElementById("alipaySale").innerHTML = emp["alipay"] + "";
                                    document.getElementById("fpsSale").innerHTML = emp["fps"] + "";
                                    document.getElementById("cashSale").innerHTML = emp["cash"] + "";
                                    document.getElementById("totalSale").innerHTML = emp["total"] + "";
                                }
                            });

                            $.ajax({
                                url: 'test111',
                                method: 'POST',
                                data: {
                                    todayDate: date,
                                },
                                success: function(response) {
                                    var result = JSON.parse(JSON.stringify(response));
                                    for (var i = 0, emp; i < result.length; i++) {
                                        emp = result[i];
                                    }
                                    chartProductTotalSale.updateSeries([{
                                        name: 'sales',
                                        data: emp["product_quantity"]
                                    }])
                                    chartProductTotalSale.updateOptions({
                                        xaxis: {
                                            categories: emp["product_name"],
                                        },
                                    })
                                    // var chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-total-sale"), optionsProductTotalSale);
                                    // chartProductTotalSale.render();
                                }
                            });

                            $("#today-date").on('change', function() {
                                date = $('#today-date').val();
                                var alipaySale = $('#alipaySale').val();

                                $.ajax({
                                    url: 'getTodaySale',
                                    method: 'POST',
                                    data: {
                                        todayDate: date,
                                    },
                                    success: function(response) {

                                        var result = JSON.parse(response);
                                        for (var i = 0, emp; i < result.length; i++) {
                                            emp = result[i];
                                        }
                                        document.getElementById("alipaySale").innerHTML = emp["alipay"] + "";
                                        document.getElementById("fpsSale").innerHTML = emp["fps"] + "";
                                        document.getElementById("cashSale").innerHTML = emp["cash"] + "";
                                        document.getElementById("totalSale").innerHTML = emp["total"] + "";
                                    }
                                });

                                $.ajax({
                                url: 'test111',
                                method: 'POST',
                                data: {
                                    todayDate: date,
                                },
                                success: function(response) {
                                    var result = JSON.parse(JSON.stringify(response));
                                    for (var i = 0, emp; i < result.length; i++) {
                                        emp = result[i];
                                    }
                                    chartProductTotalSale.updateSeries([{
                                        name: 'sales',
                                        data: emp["product_quantity"]
                                    }])
                                    chartProductTotalSale.updateOptions({
                                        xaxis: {
                                            categories: emp["product_name"],
                                        },
                                    })
                                    // var chartProductTotalSale = new ApexCharts(document.querySelector("#chart-product-total-sale"), optionsProductTotalSale);
                                    // chartProductTotalSale.render();
                                }
                            });
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Sales</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- <div id="chart-profile-visit"></div> -->
                                        <div id="chart-product-total-sale"></div>

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

                <!-- Passing the graph value to js -->
                <?php

                // $productSalesAmount = [50, 20, 30, 20, 10];

                // include('getGraphData/getGraphData.php');;
                // getTodayProductSaleAmount($date);

                ?>
                <script type="text/javascript">
                    var productSalesAmount = <?php echo json_encode($productSalesAmount); ?>;
                </script>

                <script src="template/assets/vendors/apexcharts/apexcharts.js"></script>
                <!-- <script src="template/assets/js/pages/dashboard.js"></script> -->
                <!-- Passing the graph value to js -->


            </footer>
        </div>
    </div>

    <footer>
        <script src="../template/assets/js/bootstrap-datetimepicker.js"></script>
        <script src="../template/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="../template/assets/js/bootstrap.min.js"></script>
        <script src="../template/assets/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>





    </footer>

    <?php include('../footer.php'); ?>
</body>

</html>