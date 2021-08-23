<?php include('../header.php'); ?>
<?php $currentPage = 'supplier-list'; ?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Supplier list</li>
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
                                Add new supplier
                            </button>
                                <div class="modal fade text-left modal-borderless" id="border-add" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new supplier</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-target="#border-added" method="post">
                                                    <div class="row">
                                                        <table class = "table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-6">Name:</th>
                                                                    <th class="col-md-6">Email:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody">
                                                                <tr>
                                                                    <th><input type="varchar" class="form-control" name="name[]"></th>
                                                                    <th><input type="varchar" class="form-control" name="email[]"></th>
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

                                                            $conn = OpenCon();

                                                            // Check connection
                                                            if($conn === false){
                                                                die("ERROR: Could not connect. "
                                                                    . mysqli_connect_error());
                                                            }
                                                            $supplier_name = $_REQUEST['name'];
                                                            $supplier_email = $_REQUEST['email'];

                                                            $sql_id = "SELECT MAX(supplier_id) FROM supplier";
                                                            $result_id = $conn->query($sql_id);
                                                            $row_id = $result_id->fetch_assoc();
                                                            $supplier = (int) $row_id["MAX(supplier_id)"];

                                                            $N = count($supplier_name);
                                                            for ($i = 0; $i < $N; $i++) {
                                                                $supplier++;
                                                                $sql = "INSERT INTO supplier  VALUES ('$supplier','$supplier_name[$i]','$supplier_email[$i]')";
                                                                $result = $conn->query($sql);
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Connect to the database -->
                                    <?php

                                        $conn = OpenCon();

                                        $sql = "SELECT supplier_id, supplier_name, supplier_email FROM supplier";
                                        $result = $conn->query($sql);

                                        $supplier_list = array();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                // array_push($product_list, array($row["no"], $row["name"], $row["status"], $row["p1"],  $row["p2"],  $row["p3"],  $row["stock"],  $row["location"],  $row["sake_brewer"],  $row["volume"],  $row["unit"] ));
                                                // echo $product_list[0][2];
                                                // print_r($product_list);
                                                echo "<tr><td>" .$row["supplier_id"] ."</td><td>" .$row["supplier_name"] ."</td><td>".$row["supplier_email"] . "</td>";
                                                ?>

                                                <td><button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row["supplier_id"]?>">Update</button>
                                                    <div class="modal fade text-left modal-borderless" id="updateModal<?php echo $row["supplier_id"]?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-full" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Update supplier</h5>
                                                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form action="update-list" method="post">
                                                                        <div class="row">

                                                                          <!-- <div class="col-md-1">
                                                                              <div class="form-group">
                                                                                  <label for="product">ID:</label>
                                                                                  <input type="integer" class="form-control" name="product" id="product" value="<?php echo $row["product_id"]?>">
                                                                            </div>
                                                                          </div> -->

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="name">Name:</label>
                                                                                    <input type="hidden" name="supplier" value="<?php echo $row['supplier_id']; ?>">
                                                                                    <input type="varchar" class="form-control" name="updateName" id="name" value="<?php echo $row["supplier_name"]?>">
                                                                              </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="email">Email:</label>
                                                                                    <input type="varchar" class="form-control" name="updateEmail" id="email" value="<?php echo $row["supplier_email"]?>">
                                                                              </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" type="Submit" class="btn btn-primary me-1 mb-1" name="updatesupplier">Update</button>
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
                                        echo $supplier_list[0][1];
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

    <script>
      function add() {
        var html = "<th><input type='varchar' class='form-control' name='name[]'></th>";
        html += "<th><input type='varchar' class='form-control' name='email[]'></th>";
        var table = document.getElementById("tbody");
        var row = table.insertRow();
        row.innerHTML = html;
      }
    </script>

</body>
