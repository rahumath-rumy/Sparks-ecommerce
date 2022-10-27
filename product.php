<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<HTML>
<HEAD>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<TITLE>Products</TITLE>

</HEAD>
<BODY>
    <div class="header">
        <a class="logo"> <img src="images/logo.jpg">  </a>
  
             <nav class="header-left">
                <a  href="index.php">Home</a>
                <div class="dropdown">
                    <button class="dropbtn" class="active"> Products
                        <i class="fa fa-caret-down"></i>
                    </button>

                    <div class="dropdown-options">
                        <a href="womenproduct.php" target="_blank"> Women </a>
                        <a href="menproduct.php" target="_blank"> Men</a>
                        <a href="productoffer.php" target="_blank"> Offers</a>
                    </div> 
               <a href="reg.php" target="_blank"> Sign Up </a>
               <a href="login.php" > Login </a>
               <a href="contact.php" target="_blank">Contact</a>  
                   
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

<div class="product">Products</div>
 
<div id="product-grid">
	
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY id ASC");
            if (!empty($product_array)) { 
                    foreach($product_array as $key=>$value){
            ?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <form method="post" action="account.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                        <div class="product-desc" style="font-weight:bold; font-style: oblique"><?php echo "*conditions apply"."<br>". $product_array[$key]["description"]; ?></div>
			<div class="product-price"><?php echo "LKR ".$product_array[$key]["price"]; ?></div>
			<div class="cart-action">
                             <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"></div>
                             <input type="number" class="product-quantity" name="quantity" value="1" size="2" />
                             <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value"></div>

                        </div>
                            <input type="submit" value="Add to Cart" class="btnAddAction" />
			</div>
			</form>
		</div>
	<?php
		}
	}
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
                <i class="fa fa-twitter-square" style="color:black; font-size:40px; margin: 5px" ></i> 
                <br>
            <a href="tc.html" target="_blank"><em>Terms & Conditions </em> </a>  <br>
             &copy;2020-2025 copyright by Sparks<br>
                all rights reserved.<br>
                      Designed by Rahumath Rumy!  
        </div>
        
        <div class="footer-right">
            
            <H6> PAYMENT METHODS </H6>
            <i class="fa fa-cc-visa" style=" font-size:50px"></i>
            <i class="fa fa-cc-mastercard"  style=" font-size:50px"></i>
            <i class="fa fa-cc-paypal"  style=" font-size:50px"></i> <br> <br>
            <i class="fa fa-motorcycle" style=" font-size:20px"> Free Delivery Island-wide!</i> <br>
           
        </div>
        
    </div>
</BODY>
</HTML>