<?php include('real_head.php'); ?>

<?php

session_start();

require_once ('CreateDb.php');
require_once ('helloword.php');


// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb","localhost","root");



if (isset($_POST['add'])){
    
   
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
           
            for ($x = 0; $x <count($_SESSION['cart']); $x++) {
                if($_SESSION['cart'][$x])
              echo $_SESSION['cart'][$x];
            }
            
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}?>

<body class="bg-light">

    <!-- Content -->
    <main>

        <container>
            <h1>Mobile Order</h1>

            <nav id="navbar" class="">
                <!-- Classe "scroll" sur les liens, href et id sont les mêmes comme sur une ancre normale -->

                <a class="scroll" href="#section-1">Section 1</a>
                <a class="scroll" href="#section-2">Section 2</a>
                <a class="scroll" href="#section-3">Section 3</a>
                <a class="scroll" href="#section-4">Section 4</a>

            </nav>
            <div data-spy="scroll" data-target="#navbar" data-offset="0">

    <section id="section-1">
                <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-12">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    cartElement2($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                

            ?>



</div>
        <!-- </div>
                </section>
                <section id="section-2">
                    <span>Section 2</span>
                </section>
                <section id="section-3">
                    <span>Section 3</span>
                </section>
             
            </div> -->
        </container>
    </main>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

