<?php include('../header.php'); ?>
<?php $currentPage = 'item-list'; ?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Items list</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable

                            <!--                            <div class="col-md-6 mb-4">-->
                            <!--                                <h6>Multiple Select with Remove Button</h6>-->
                            <!--                                <p>Use <code>.multiple-remove</code> attribute for multiple select box with remove-->
                            <!--                                    button.</p>-->
                            <!--                                <div class="form-group">-->
                            <!--                                    <select class="choices form-select multiple-remove" multiple="multiple">-->
                            <!--                                        <optgroup label="Figures">-->
                            <!--                                            <option value="romboid">Romboid</option>-->
                            <!--                                            <option value="trapeze" selected>Trapeze</option>-->
                            <!--                                            <option value="triangle">Triangle</option>-->
                            <!--                                            <option value="polygon">Polygon</option>-->
                            <!--                                        </optgroup>-->
                            <!--                                        <optgroup label="Colors">-->
                            <!--                                            <option value="red">Red</option>-->
                            <!--                                            <option value="green">Green</option>-->
                            <!--                                            <option value="blue" selected>Blue</option>-->
                            <!--                                            <option value="purple">Purple</option>-->
                            <!--                                        </optgroup>-->
                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            {% endblock %}-->
                            <!--                            {% block stylesfirst %}-->
                            <!--                            <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />-->
                            <!--                            {% endblock %}-->
                            <!--                            {% block js %}-->
                            <!--                            <script src="assets/vendors/choices.js/choices.min.js"></script>-->
                            <!--                            {% endblock %}-->

                            <button type="button" class="btn btn-outline-primary block float-start float-lg-end" data-bs-toggle="modal" data-bs-target="#border-add">
                                Add new item
                            </button>

                            <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new item</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form data-target="#border-added" method="post">
                                                <div class="row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-3">Name:</th>
                                                                <th class="col-md-2">Location:</th>
                                                                <th class="col-md-2">Sake Brewer:</th>
                                                                <th class="col-md-1">P1:</th>
                                                                <th class="col-md-1">P2:</th>
                                                                <th class="col-md-1">P3:</th>
                                                                <th class="col-md-1">Volume:</th>
                                                                <th class="col-md-1">Unit:</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody">
                                                            <tr>
                                                                <th><input type="varchar" class="form-control" name="name[]"></th>
                                                                <th><input type="varchar" class="form-control" name="location[]"></th>
                                                                <th><input type="varchar" class="form-control" name="sake_brewer[]"></th>
                                                                <th><input type="integer" class="form-control" name="p1[]"></th>
                                                                <th><input type="integer" class="form-control" name="p2[]"></th>
                                                                <th><input type="integer" class="form-control" name="p3[]"></th>
                                                                <th><input type="integer" class="form-control" name="volume[]"></th>
                                                                <th><input type="integer" class="form-control" name="unit[]"></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary" onclick="add()">
                                                                <i class="bi bi-plus-circle"></i>
                                                            </button>
                                                        </div>
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
                            <div class="modal fade text-left modal-borderless" id="border-added" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new data</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <tbody>
                                                    <center>
                                                        <?php

                                                        $conn = OpenCon();

                                                        // Check connection
                                                        if ($conn === false) {
                                                            die("ERROR: Could not connect. "
                                                                . mysqli_connect_error());
                                                        }

                                                        $p1 = $_REQUEST['p1'];
                                                        $p2 = $_REQUEST['p2'];
                                                        $p3 = $_REQUEST['p3'];
                                                        $location = $_REQUEST['location'];
                                                        $sake_brewer = $_REQUEST['sake_brewer'];
                                                        $name = $_REQUEST['name'];
                                                        $volume = $_REQUEST['volume'];
                                                        $unit = $_REQUEST['unit'];

                                                        $sql_id = "SELECT MAX(product_id) FROM wine_list";
                                                        $result_id = $conn->query($sql_id);
                                                        $row_id = $result_id->fetch_assoc();
                                                        $product = (int) $row_id["MAX(product_id)"];

                                                        $N = count($name);
                                                        for ($i = 0; $i < $N; $i++) {
                                                            // Performing insert query execution
                                                            $product++;
                                                            $sql = "INSERT INTO wine_list VALUES ('$product','$p1[$i]','$p2[$i]','$p3[$i]',
                                                                  '$location[$i]','$sake_brewer[$i]','$name[$i]','$volume[$i]','$unit[$i]')";
                                                            $result = $conn->query($sql);

                                                            $sql = "INSERT INTO stock VALUES ('$product', '0')";
                                                            $result = $conn->query($sql);
                                                        }

                                                        // if(mysqli_query($conn, $sql)){
                                                        //     echo "<h3>Data stored in a database successfully."
                                                        //     . " Please browse your localhost"
                                                        //     . " to view the updated data</h3>";
                                                        //
                                                        //     echo nl2br("No : $no\n"
                                                        //         . "Status : $status\nP1 : $p1\nP2 : $p2\nP3 : $p3\nStatus : $status\nLocation : $location\nSake brewer : $sake_brewer\nName : $name\nVolume : $volume\nUnit : $unit\n");
                                                        // } else{
                                                        //     // echo "ERROR : Invalid input $sql. "
                                                        //     // . mysqli_error($conn);
                                                        //     echo "ERROR : Invalid input. "
                                                        //     . mysqli_error($conn);
                                                        // }
                                                        mysqli_close($conn);
                                                        ?>
                                                        <div>
                                                            <div class="card-body">
                                                            </div>

                                                            <input type="addnew" value="Addnew" class="btn-check" id="addnew" onClick="document.location.href='addnew'" />
                                                            <label class="btn btn-outline-success" for="addnew">Add another data</label>

                                                            <input type="mainn" value="Mainn" class="btn-check" id="mainn" onClick="document.location.href='dashboard'" />
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
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>Location</th>
                                        <th>Sake Brewer</th>
                                        <th>Volume</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                    $conn = OpenCon();

                                    $sql = "SELECT product_id, p1, p2, p3, location, sake_brewer, name, volume, unit FROM wine_list";
                                    $result = $conn->query($sql);

                                    $product_list = array();

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                            // echo $product_list[0][2];
                                            // print_r($product_list);
                                            echo "<tr><td>"
                                                . $row["product_id"] . "</td><td>"
                                                . $row["name"] . "</td><td>" . "$"
                                                . $row["p1"] . "</td><td>" . "$"
                                                . $row["p2"] . "</td><td>" . "$"
                                                . $row["p3"] . "</td><td>"
                                                . $row["location"] . "</td><td>"
                                                . $row["sake_brewer"] . "</td><td>"
                                                . $row["volume"] . "ML" . "</td><td>"
                                                . $row["unit"] . "/ctn" . "</td>";
                                    ?>

                                            <td><button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row["product_id"] ?>">Update</button>
                                                <div class="modal fade text-left modal-borderless" id="updateModal<?php echo $row["product_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update item</h5>
                                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form action="update-list" method="post">
                                                                    <div class="row">

                                                                        <!-- <div class="col-md-1">
                                                                              <div class="form-group">
                                                                                  <label for="product">ID:</label>
                                                                                  <input type="integer" class="form-control" name="product" id="product" value="<?php echo $row["product_id"] ?>">
                                                                            </div>
                                                                          </div> -->

                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="name">Name:</label>
                                                                                <input type="hidden" name="product" value="<?php echo $row['product_id']; ?>">

                                                                                <input type="varchar" class="form-control" name="updateName" id="name" value="<?php echo $row["name"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="location">Location:</label>
                                                                                <input type="varchar" class="form-control" name="updateLocation" id="location" value="<?php echo $row["location"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="sake_brewer">Sake Brewer:</label>
                                                                                <input type="varchar" class="form-control" name="updateSake_brewer" id="sake_brewer" value="<?php echo $row["sake_brewer"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label for="p1">P1:</label>
                                                                                <input type="integer" class="form-control" name="updateP1" id="p1" value="<?php echo $row["p1"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label for="p2">P2:</label>
                                                                                <input type="integer" class="form-control" name="updateP2" id="p2" value="<?php echo $row["p2"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label for="p3">P3:</label>
                                                                                <input type="integer" class="form-control" name="updateP3" id="p3" value="<?php echo $row["p3"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label for="volume">Volume:</label>
                                                                                <input type="integer" class="form-control" name="updateVolume" id="volume" value="<?php echo $row["volume"] ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1">
                                                                            <div class="form-group">
                                                                                <label for="unit">Unit:</label>
                                                                                <input type="integer" class="form-control" name="updateUnit" id="unit" value="<?php echo $row["unit"] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" type="Submit" class="btn btn-primary me-1 mb-1" name="updateitem">Update</button>
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
                                            </td>
                                    <?php

                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    echo $product_list[0][1];
                                    CloseCon($conn);
                                    ?>
                                    <!-- Connect to the database -->
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

    <script>
        function add() {
            var html = "<th><input type='varchar' class='form-control' name='name[]'></th>";
            html += "<th><input type='varchar' class='form-control' name='location[]'></th>";
            html += "<th><input type='varchar' class='form-control' name='sake_brewer[]'></th>";
            html += "<th><input type='integer' class='form-control' name='p1[]'></th>";
            html += "<th><input type='integer' class='form-control' name='p2[]'></th>";
            html += "<th><input type='integer' class='form-control' name='p3[]'></th>";
            html += "<th><input type='integer' class='form-control' name='volume[]'></th>";
            html += "<th><input type='integer' class='form-control' name='unit[]'></th>";
            var table = document.getElementById("tbody");
            var row = table.insertRow();
            row.innerHTML = html;
        }
    </script>

</body>
