<?php include('../header.php'); ?>

<!DOCTYPE html>
<html lang="en">

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
                        </div>
                        <div class="card-body">
                            <h1> Storing Form data in Database</h1>
                            <form action="insert" method="post">
                            <div class="row">
                                <div class="col-md-6">
                
                                        <div class="form-group">
                                            <label for="no">No:</label>
                                            <input type="integer" class="form-control" name="no" id="No" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <input type="varchar" class="form-control" name="status" id="Status" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="p1">P1:</label>
                                            <input type="varchar" class="form-control" name="p1" id="P1" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="p2">P2:</label>
                                            <input type="varchar" class="form-control" name="p2" id=P2 placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="p3">P3:</label>
                                            <input type="varchar" class="form-control" name="p3" id="P3" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="stock">Stock:</label>
                                            <input type="varchar" class="form-control" name="stock" id="Stock" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="location">Location:</label>
                                            <input type="varchar" class="form-control" name="location" id="Location" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="sake_brewer">Sake Brewer:</label>
                                            <input type="varchar" class="form-control" name="sake_brewer" id="Sake_brewer" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="varchar" class="form-control" name="name" id="Name" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="volume">Volume:</label>
                                            <input type="varchar" class="form-control" name="volume" id="Volume" placeholder="">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="unit">Unit:</label>
                                            <input type="varchar" class="form-control" name="unit" id="Unit" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                    
                                <center>
                                    <input type="submit" class="btn-check" value="Submit" id='submit'>
                                    <label class="btn btn-outline-success" for="submit">Submit</label>
                                    <form action="addnew.php" method="post">
                                        <input type="reset" class="btn-check" value="Reset" id='reset'>
                                        <label class="btn btn-outline-danger" for="reset">Reset</label>
                                    </form>
                                </center>
                                
                            </form>
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