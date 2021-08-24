
<?php

session_start();

require_once ('CreateDb.php');
require_once ('helloword.php');

$db = new CreateDb("Productdb", "Producttb","localhost","root");

if ($_GET['action'] == 'add')
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
           
            
    }
  }


?>
<?php



function element($productName,$productprices,$producing,$productid){

$element2="
<div class =\"col-md-3 col-sm-6 my-3 my-md-0\">
<form action=\"helloworld.php\" method=\"post\">
<div class=\"card shadow\">
<div>
    <img src=\"$producing\" alt=\"image\" class=\"img-fluid card-img-top\">
</div>
<div class=\"card-body\">
    <h5 class = \"card-tittle\">$productName</h5>
    <span class=\"fa fa-star checked\"></span>
    <span class=\"fa fa-star checked\"></span>
    <span class=\"fa fa-star checked\"></span>
    <span class=\"fa fa-star\"></span>
    <span class=\"fa fa-star\"></span>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css\" integrity=\"sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni\" crossorigin=\"anonymous\">
    <span class=\"price\">
    $productprices
    </span>


    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
    <input type='hidden' name='product_id' value='$productid'>
</div>
</div>
</form>
</div>

";
echo $element2;
}


function realcart($productimg,$productname,$productprice ,$productid){
    $element = "


        <img src=$productimg alt=\"Image1\" class=\"img-fluid\">

        

    ";
    
   
   echo $element;

   
}



function cartElement($productimg,$productname,$productprice ,$productid){
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\" class =\"col-lg-7\">
<div class=\"border rounded\">
    <div class=\"row bg-white\">
        <div class=\"col-md-3 pl-0\">
        <img src=$productimg alt=\"Image1\" class=\"img-fluid\">

        </div>
        <div class=\"col-md-6\">
            <h5 class =\"pt-2\">$productname</h5><br>
            <small class= \"text-secondary\"> Seller:dailytuition</small><br>
            <h5 class =\"pt-2\"> $productprice</h5><br>
            <button type =\"submit\" class =\"btn btn-warning\">Save for Later</button>
            <button type=\"submit\" class=\"btn btn-danger mx-2\" name =\"remove\"> Remove </button>

    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>



        </div>
        <div class = \"col-md-3 py-5\">
            <div>
            <button type=\"submit\" class=\"btn btn-danger mx-2\" name =\"remove\"><i class=\"fas fa-minus\"></i></button>
                
                <input type=\"text\" value=\"6\" class=\"form-control w-25 d-inline\">
                <button type =\"button\" class=\"btn bg-light border rounded-circle\" name=\"\"><i class=\"fas fa-plus\"></i></button>
                    

            </div>

        </div>
    </div>

</div>
</form>


    ";
    
   echo $element;
}





function cartElement2($productName,$productprices,$producing,$productid){
    $element = "

    <form action=\"real_order.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\" class =\"col-lg-7\">
<div class=\"border rounded\">
    <div class=\"row bg-white\">
        <div class=\"col-md-3 pl-0\">
        <img src=$producing alt=\"Image1\" class=\"img-fluid\">

        </div>
        <div class=\"col-md-6\">
            <h5 class =\"pt-2\">$productName</h5><br>
            <small class= \"text-secondary\"> Seller:dailytuition</small><br>
            <h5 class =\"pt-2\"> $productprices</h5><br>
           
            

    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
    <input type='hidden' name='product_id' value='$productid'>


        </div>
       
        <div class = \"col-md-3 py-5\">
        <div>
        <button type=\"submit\" class=\"btn btn-danger mx-2\" name =\"remove\"><i class=\"fas fa-minus\"></i></button>
            
            <input type=\"text\" value=\"0\" class=\"form-control w-25 d-inline\">
            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\"><i class=\"fas fa-plus\"></i></button>
                

        </div>

        </div>
    </div>

</div>
</form>


    ";
    
   echo $element;
}




function cartcolumn($productimg,$productname,$productprice ,$productid,$productquan){

    
    $element = "

    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\" class =\"col-lg-7\">
<div class=\"border rounded\">
    <div class=\"row bg-white\">
        <div class=\"col-md-3 pl-0\">
        <img src=$productimg alt=\"Image1\" class=\"img-fluid\">

        </div>
        <div class=\"col-md-6\">
            <h5 class =\"pt-2\">$productname</h5><br>
          
            <h5 class =\"pt-2\"> $productprice</h5><br>
            
            <h5 class =\"pt-2\"> $productquan</h5><br>
            <button type =\"submit\" class =\"btn btn-warning\">Save for Later</button>
            <button type=\"submit\" class=\"btn btn-danger mx-2\" name =\"remove\"> Remove </button>

    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>



        </div>
        <div class = \"col-md-3 py-5\">
            <div>
            <button type=\"submit\" class=\"btn btn-danger mx-2\" name =\"remove\"><i class=\"fas fa-minus\"></i></button>
                
                <input type=\"text\" value=\"6\" class=\"form-control w-25 d-inline\">
                <button type =\"button\" class=\"btn bg-light border rounded-circle\" name=\"\"><i class=\"fas fa-plus\"></i></button>
                    

            </div>

        </div>
    </div>

</div>
</form>


    ";
    
   echo $element;
}




?>





