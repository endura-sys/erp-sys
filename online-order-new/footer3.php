
 <?php require_once ("header.php"); ?>
<?php

session_start();

require_once ('CreateDb.php');
require_once ('helloword.php');

$db = new CreateDb("Productdb", "Producttb","localhost","root");

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                print($_SESSION['cart'][$key]);
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }

  if (isset($_POST['plus'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
               
            }
        }
    }
  }


?>

<html>
<head>
<style>


/* .popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  bottom:500px;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:1;
  display:none;
  overflow:auto;
} */
 
.popup .content {
  position:absolute;
  top:40%;
  left:50%;
  bottom:10px;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:295%;
  max-width:10000px;
  height:1000px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
  overflow-y:scroll;
}
 
.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}
 
.popup.active .overlay {
  display:block;
}
 
.popup.active .content {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}
/* .pop_up{
  position:absolute;
  overflow:auto;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  padding:15px;
  font-size:18px;
  border:2px solid #222;
  color:#222;
  text-transform:uppercase;
  font-weight:600;
  background:#fff;
} */
body {margin:0;}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   
   background-color: black;
   color: white;
   text-align: center;
   
}
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropup {

  position: relative;

 
}

.dropup-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  bottom: 50px;
 
  z-index: 1;
}

.dropup-content a {
  color: blue;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropup-content a:hover {background-color: #ccc}

.dropup:hover .dropup-content {
  display: block;
}

.dropup:hover .dropbtn {
  background-color: #2980B9;
}
/* li {
  display: inline-block;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: red;
}

.active {
  background-color: grey;
} */
</style>
</head>
<body>

<div class="footer">
<table border="0" cellpadding="5" cellspacing="10" class="menubar_editor" style="width:100%;">
	<tbody>
  <tr>
			<td style="width: 20%; text-align: center;"><strong><h2>電話</h2></strong></td>
			<td style="width: 20%; text-align: center;"><strong><h2>訂單</h2></strong></td>
			<td style="width: 20%; text-align: center;"><strong><div class="dropup">
  
<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">×</div>
    <?php
                    $total=0;
                    if (isset($_SESSION['cart'])){
                       $product_id = array_column($_SESSION['cart'], 'product_id');
                       $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                  cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }
                    


                ?>

  </div>
</div>
 
<button class = "pop_up" onclick="togglePopup()"><h2>我的購物車<?php

if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
} else {
    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
}

?> </h2></button></h6>




<script>


function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script></td>
			<td style="width: 20%; text-align: center;"><strong><h2>我的訂單</h2></strong></td>
			<td style="width: 20%; text-align: center;"><strong><h2>去結算</h2></strong></td>
		
		</tr>
	</tbody>
</table>


</div>


</body>
</html>
