

<?php

session_start();

require_once ('CreateDb.php');
require_once ('real_order.php');


// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb","localhost","root");




  
if (isset($_POST['add'])){
    

   
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

   

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}?>

<head>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

  

    <link rel="stylesheet" href="style.css">
</head>



<body>
    <!-- Content -->

  
    <?php include('footer3.php'); ?>
    <main>

 
   
        <container>
            
            <?php
            
         
            
            include('real_content.php'); ?>
         
            
            
    

        </container>
      
        
        
    </main>
    

      
   
    

</body>

