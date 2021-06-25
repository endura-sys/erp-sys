<?php include('../header.php'); ?>
<?php $currentPage = 'branch'; ?>

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

                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal"
                                data-bs-target="#border-add">
                                Add new data
                            </button>
                                <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new data</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-target="#border-added" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            
                                                            <div class="form-group">
                                                                <label for="branch_id">Branch id:</label>
                                                                <input type="integer" class="form-control" name="branch_id" id="Bracnch id" placeholder="">
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label for="employee_id">Employee id:</label>
                                                                <input type="integer" class="form-control" name="employee_id" id="Employee id" placeholder="">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            
                                                                                                                        
                                                        <div class="form-group">
                                                                <label for="date_of_start">Starting time:</label>
                                                                <input type="time" class="form-control" name="date_of_start" id="Starting time" placeholder="">
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label for="date_of_end">Ending time:</label>
                                                                <input type="time" class="form-control" name="date_of_end" id="Ending time" placeholder="">
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <form data-target="#border-added" method="post">
                                                            <input type="submit" class="btn-check" value="Submit" id='submit'>
                                                            <label class="btn btn-primary" for="submit">Submit</label>
                                                        </form>
                                                        <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal fade text-left modal-borderless" id="border-added" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new data</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
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
                                                            
                                                            $branch_id =  $_REQUEST['branch_id'];
                                                            $employee_id =  $_REQUEST['employee_id'];
                                                            $date_of_start = $_REQUEST['date_of_start'];
                                                            $date_of_end = $_REQUEST['date_of_end'];
                                                            
                                                            // Performing insert query execution
                                                            $sql = "INSERT INTO branch  VALUES ('$branch_id'
                                                                ,'$employee_id','$date_of_start','$date_of_end')";
                                                            
                                                            if(mysqli_query($conn, $sql)){
                                                                echo "<h3>Data stored in a database successfully." 
                                                                . " Please browse your localhost" 
                                                                . " to view the updated data</h3>"; 
                                                                
                                                                echo nl2br("Branch id : $branch_id\n"
                                                                    . "Employee id : $employee_id\nEnding time : $date_of_start\nStarting time : $date_of_end\n");
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
                                                                onClick="document.location.href='addnew'" />
                                                            <label class="btn btn-outline-success" for="addnew">Add another data</label>
                                                            
                                                            <input type="mainn" value="Mainn" class="btn-check" id="mainn" 
                                                                onClick="document.location.href='dashboard'" />
                                                            <label class="btn btn-outline-danger" for="mainn">Back to database</label>
                                                        </div>
                                                    </center>
                                                </tbody>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>櫃位編號</th>
                                        <th>值班人員編號</th>
                                        <th>上崗時間</th>
                                        <th>下崗時間</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        include '../../database.php';
                                        $conn = OpenCon();

                                        $sql = "SELECT branch_id, employee_id, time_of_start, time_of_end FROM branch";
                                        $result = $conn->query($sql);

                                        $product_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["branch_id"] ."</td><td>" .$row["employee_id"] ."</td><td>" .$row["time_of_start"] ."</td><td>" . $row["time_of_end"] ."</td><td>" ."</td>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        echo $product_list[0][1];
                                        CloseCon($conn);
                                    ?>

                                    
                                </tbody>
                                
                            </table>
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

