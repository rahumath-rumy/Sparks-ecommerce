<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<?php

if(isset($_POST['search']))
{
    $search = $_POST['search'];
    $query = "SELECT * FROM `product` WHERE CONCAT( `name`, `description`) LIKE '%".$search."%'";
    $search_result = filter($query);   
}
else {
    $query = "SELECT * FROM `product`";
    $search_result = filter($query);
}

function filter($query)
{
    $connect = mysqli_connect("localhost", "root", "12345", "sparks");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<HTML>
<HEAD>
     <meta charset="UTF-8">
    <meta name="viewport" content="width =device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<TITLE>Search Products</TITLE>

</HEAD>
<BODY>
    <div class="header">
        <a class="logo"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a  href="index.php">Home</a>
                    <div class="dropdown">
                       <a class="active" href="product.php">Product</a>
                 
                    <div class="dropdown-options">
                      <a href="womenproduct.php" target="_blank"> Women </a>
                      <a href="menproduct.php" target="_blank"> Men</a>
                      <a href="productoffer.php" target="_blank"> Offers</a>
                    </div>
                    </div>
               <a href="reg.php" target="_blank"> Sign Up </a>
               <a href="login.php" > Login </a>
               <a href="contact.html" target="_blank">Contact</a>  
                   
             </nav>
        <div class="search-right">
                <form class="search" method="POST" action="search.php" style=" margin:auto">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                
                </form>
                 
             </div>
            
             
        <div class="cart-right">
            <a href="cart.php" >
          <span class="fa fa-shopping-cart"></span> Cart
        </a>
             </div>
    </div>

<div class="product">YOUR SEARCH REVEALED THE FOLLOWING PRODUCTS! </div>

 <div id="product-grid">
      <!-- populate table from mysql database -->
  <?php while($row = mysqli_fetch_array($search_result)):?>
     
        <div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $row["code"]; ?>">
                        <form method="post" action="account.php?action=add&code=<?php echo $row["code"]; ?>">
			<div class="product-image"><img src="<?php echo  $row["image"]; ?>"></div>
			<div class="product-tile-footer">
                        
			<div class="product-title"><?php echo  $row["name"]; ?></div>
                        
			<div class="product-price"><?php echo "LKR ". $row["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
        </div>
                 <?php endwhile;
            
            ?>  
      </div>                
    

   <div class="footer">
        <div class="footer-left">
                
            <i class="fa fa-map-marker" style=" font-size:15px"> </i> No. 15 Kinross Ave, Colombo 04 <br> 
            <i class="fa fa-phone-square" style=" font-size:15px"> </i> 011-272-1234 <br> 
            <i class="fa fa-mobile" style="font-size:20px"></i> 077-353-610 <br>
            <i class="fa fa-envelope" style=" font-size:15px"> </i> sparks@gmail.com
        </div>
        
        <div class="footer-center">
                <i class="fa fa-facebook-official" style="color:blue; font-size:40px; margin: 5px"></i> 
                <i class="fa fa-instagram" style="color:magenta; font-size:40px; margin: 5px"></i> 
                <i class="fa fa-twitter-square" style="color:#00acee; font-size:40px; margin: 5px" ></i> 
                <br>
            <a href="tc.html" target="_blank"><em>Terms & Conditions </em> </a>  <br>
             &copy;2020-2025 copyright by Sparks<br>
             all rights reserved.<br>
                Designed by Rahumath Rumy!  
        </div>
        
        <div class="footer-right">
            
            <H6> PAYMENT METHODS </H6>
            <i class="fa fa-cc-visa" style=" font-size:50px; color:navy;"></i>
            <i class="fa fa-cc-mastercard"  style=" font-size:50px; color:red"></i>
            <i class="fa fa-cc-paypal"  style=" font-size:50px; color:darkslateblue"></i> <br> <br>
            <i class="fa fa-motorcycle" style=" font-size:20px"> Free Delivery Island-wide!</i> <br>
           
        </div>
        
    </div>
</BODY>
</HTML>