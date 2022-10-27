<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
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
<TITLE> Shopping Cart</TITLE>

</HEAD>
<BODY>
    <div class="header">
        <a class="logo"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a  href="index.php">Home</a>
                    <div class="dropdown">
                         <button class="dropbtn"> Products
                                <i class="fa fa-caret-down"></i>
                         </button>
                
                    <div class="dropdown-options">
                      <a href="womenproduct.php" target="_blank"> Women </a>
                      <a href="menproduct.php" target="_blank"> Men</a>
                      <a href="productoffer.php" target="_blank"> Offers</a>
                    </div> 
                    </div>
               <a href="reg.php" target="_blank"> Sign Up </a>
               <a href="login.php"> Login </a>
               <a href="contact.php" target="_blank">Contact</a>  
                   
             </nav>
             
        <div class="cart-right">
            <a class="active" href="cart.php" >
          <span class="fa fa-shopping-cart"></span> Your Cart
        </a>
             </div>
    </div>

<div id="shopping-cart">
<div class="heading">Welcome To Your Shopping Cart!! </div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart??</a>
<?php

if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tablecart" cellpadding="8" cellspacing="2">
<tbody>
<tr>

<th style="text-align:Center;">Type</th>
<th style="text-align:Center;">Code</th>

<th style="text-align:Center;" width="5%">Quantity</th>

<th style="text-align:Center;" width="10%">Unit Price</th>
<th style="text-align:center;" width="10%">Price</th>
<th style="text-align:center;" width="10%">Remove</th>
</tr>	
<?php	
         
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
                                
				<td style="text-align:center;"><?php echo $item["name"]; ?></td>
				<td style="text-align:center;"><?php echo $item["code"]; ?></td>
                                <td style="text-align:center;" class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">
                       <div class="cart-action"> <input type="number" class="product-quantity" name="quantity" value="<?php echo $item["quantity"]; ?>" size="2" /> </div></td>
                                
				
                                
<script>      
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}
function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
</script>
				<td  style="text-align:center;"><?php echo $item["price"]; ?></td>
				<td  style="text-align:center;"><?php echo number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
                               
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
    <td colspan="2" align="right"><strong>Total:</strong></td>
    <td align="center"><strong><?php echo $total_quantity; ?></strong></td>
<td align="right" colspan="2"><strong><?php echo "Rs. ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="emptycart"> <i class="fa fa-exclamation" style="color:red"> Your Cart is Empty </i> </div>

<?php 
}
?>
</div>
    
<div class="checkout">
    <a href="login.php">
    <i class="fa fa-arrow-circle-right"> Proceed To Checkout  </i></a> 
</div>

<div class="continue">
    <a href="index.php">
    <i class="fa fa-arrow-circle-left"> Continue Shopping  </i></a> 
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
            <i class="fa fa-cc-visa" style=" font-size:50px; color:navy;"></i>
            <i class="fa fa-cc-mastercard"  style=" font-size:50px; color:red"></i>
            <i class="fa fa-cc-paypal"  style=" font-size:50px; color:darkslateblue"></i> <br> <br>
            <i class="fa fa-motorcycle" style=" font-size:20px"> Free Delivery Island-wide!</i> <br>
           
        </div>
        
    </div>
</BODY>
</HTML>
