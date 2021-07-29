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
                        <?php
                        date_default_timezone_set('Asia/Hong_Kong');
                        $date = date('Y-m-d');
                        ?>
                        <div class="form-group">
                            <input id="today-date" name="todayDate" type="date" class="form-control" value="<?php echo $date ?>" />
                        </div>
                    </div>
                    <!-- Date picker -->
                    

                    <script>
                        $(function() {
                            var date = $('#today-date').val();

                            $.ajax({
                                url:'getGraphData',
                                method:'POST',
                                data:{
                                    todayDate: date,
                                },
                                success:function(response){

                                    const result = response.split(",");
                                    document.getElementById("alipaySale").innerHTML = result[0];
                                    document.getElementById("fpsSale").innerHTML = result[1];
                                    document.getElementById("cashSale").innerHTML = result[2];
                                    // alert(result[2]);
                                    // alert(response);
                                }
                            });
                            
                            // jQuery.ajax({
                            //     type: "GET",
                            //     url: 'getGraphData',
                            //     dataType: 'json',
                            //     data: {
                            //         functionname: 'getTodaySale',
                            //         arguments: [date]
                            //     },
                            //     success: function(obj, textstatus) {
                            //         console.log(123);
                            //         if (!('error' in obj)) {
                            //             yourVariable = obj.result;
                            //             console.log(yourVariable);
                            //             console.log(obj);
                            //         } else {
                            //             console.log(obj.error);
                            //         }
                            //     }
                            // });

                            $("#today-date").on('change', function() {
                                date = $('#today-date').val();
                                var alipaySale = $('#alipaySale').val();

                                $.ajax({
                                url:'getGraphData',
                                method:'POST',
                                data:{
                                    todayDate: date,
                                },
                                success:function(response){
                                    const result = response.split(",");
                                    document.getElementById("alipaySale").innerHTML = result[0];
                                    document.getElementById("fpsSale").innerHTML = result[1];
                                    document.getElementById("cashSale").innerHTML = result[2];
                                    // alert(result[0] + result[1] + result[2]);
                                    // alert(response);
                                    // alert(JSON.parse(response.fps));
                                }
                            });

                                // $.ajax({
                                //     type: 'GET',
                                //     //url: base_url,
                                //     success: function(x) {
                                //         // document.cookie = "date=", date;
                                //         // console.log(date);
                                //         document.getElementById("alipaySale").innerHTML = <?php echo $alipaySale + 1 ?>;
                                //     }
                                // });
                                // jQuery.ajax({
                                //     type: "POST",
                                //     url: 'getGraphData',
                                //     dataType: 'json',
                                //     data: {
                                //         functionname: 'getTodaySale',
                                //         arguments: [date]
                                //     },

                                //     success: function(obj, textstatus) {
                                //         console.log(123);
                                //         if (!('error' in obj)) {
                                //             yourVariable = obj.result;
                                //             console.log(yourVariable);
                                //             console.log(obj);
                                //         } else {
                                //             console.log(obj.error);
                                //         }
                                //     }
                                // });
                            });
                        });
                    </script>
                    <!-- include get Grap data -->
                    <!-- <script>
                        $(function() {
                            $("#today-date").on('change', function() {
                                var x = $('#today-date').val();
                                $.ajax({
                                    type: 'GET',
                                    //url: base_url,
                                    data: { "todayDate": $('#today-date').val() },
                                    success: function(x) {
                                        var x = $('#today-date').val();
                                        console.log(x);
                                    }
                                });
                            });
                        });
                    </script> -->

                    <?php
                    $todayDate = $_COOKIE['date'];
                    // echo var_dump(getTodaySale("2021-07-28"));
                    ?>



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