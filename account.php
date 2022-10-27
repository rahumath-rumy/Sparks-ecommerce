<?php
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }


require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"],  'quantity'=>$_POST["quantity"],));
			
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
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width =device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery.js"> </script>
<script type="text/javascript"> 
    
 function validatephone(phone)
  	{
  		
  		phone = phone.replace(/[^0-9]/g,'');
  		$("#phonefield").val(phone);
  		if( phone == '' || !phone.match(/^07[0-9]{8}$/) )
  			{
  				$("#phonefield").css({ 'border':'solid 1px red'});
  				
  				return false;
  			}
  		else
  			{
  				$("#phonefield").css({  'border':'solid 1px white'});
  			return true;	
  			}
  	}
 
    
        
  </script>
<title> Sparks </title>
<style>
    
    .header-right{
        float:right;
    }
    .header1{
    text-align:center;
    font-size:30px;
    font-family:monospace;
    margin-top:10px;
    font-weight:bold;
   
}
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 45%; /* IE10 */
  flex: 45%;
}

.col-25{
    padding:40px 220px 40px 220px;
    
}

.column{
    float:left;
    width:47%;
    padding:10px 10px 10px 20px;
    border: 5px solid black;
  border-radius: 13px;
  margin: 10px 10px 10px 25px;
  background-color:lightgrey;  
  font-weight:bold;
    
}

.billing{
    text-align:center; 
    text-decoration:underline;
    font-weight:bold;
    font-family:impact,helvetica; 
    font-size:25px;
}
.container{
    background-color:lightblue;
    padding: 10px 10px 10px 10px;
    border: 5px solid darkblue;
  border-radius: 20px;
}
input[type=text],input[type=password], input[type=email] {
  width: 70%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=text]:focus, input[type=password]:focus, input [type=email]:focus {
  background-color: lightgray;
  outline: none;
}

.icon-container {
  margin-bottom: 4px;
  margin-top: 4px;
  padding: 4px 4px;
  font-size: 44px;
}

.btn {
  background-color: seagreen;
  color: white;
  padding: 12px;
  float:left;
  border: none;
  width: 40%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  margin-right:17px;
  
}

.btn:hover {
  background-color: darkgreen;
}


.edit {
    float :right;
    font-size:20px;
    text-decoration:underline;
    margin-right: 15px;
    margin-bottom: 30px;
}

.edit a{
    color:black;
    font-family: helvetica ;
}

.edit a:hover{
 background-color: darkslateblue;
 color: white;
 cursor: pointer;
 padding: 5px 5px 5px 5px;
}

.cartt{

	font-size: 0.9em;
       
}

.cartt th {
	font-weight: bold;
        font-family:canberra;
        font-size:20px;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column;
  }
  .col-25 {
    margin-bottom: 20px;
  margin-left:12px;
  }
  

  .btn{
     
  padding: 10px;
   width: 60%;
  font-size: 11px;
  margin-right:10px;
  }
}

    </style>
<body>
    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
        
    <div class="header">
        <a class="logo"> <img src="images/logo.jpg">  </a>
  
            <?php  if (isset($_SESSION['username'])) : ?>
    	 <strong><?php echo $_SESSION['username']; ?>, Welcome To Your Sparks Account! </strong>
        <div class="search-right"> 
            <a href="updateprofile.php">Edit Profile</a>
            <a href="index.php" value="del_user" onclick="return confirm('Are you sure to delete?')">Delete</a>
            <a href="index.php?logout='1'" >Logout</a>
            
            
        </div>
    <?php endif ?>
        </div>
    
    
 
<div class="row">   
<div class="col-25">
<div class="container">  
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<h2 style="text-align:center; font-family:Impact, Charcoal, sans-serif; text-decoration:underline; "> YOUR CART DETAILS
<div class="edit">
    <a href="cart.php">
        <i class="fa fa-arrow-circle-left"> Edit Cart?  </i></a>
        <br></h2>

<table class="cartt" cellpadding="4" cellspacing="2">
<tbody>
<tr>
<th style="text-align:left; text-decoration:underline; font-size:25px">Name</th>
<th style="text-align:center; text-decoration:underline; font-size:25px" width="10%">Quantity</th>
<th style="text-align:right; text-decoration:underline; font-size:25px" width="20%">Price</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><?php echo $item["name"]; ?></td>
				<td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo number_format($item_price,2); ?></td>
				
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>

<td colspan="2" align="left" style="font-weight:bold; font-size:20px; color:red; font-family:cursive">Your Total Bill (LKR):</td>
<td align="right" colspan="2" style="font-size:20px;  text-align:right; color:red; font-family:cursive;"><strong><?php echo number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<span class="fa fa-shopping-cart" style="font-size:30px; padding-left:55px;">  <?php echo $total_quantity; ?> </span>

  <?php
} else {
?>
<div class="emptycart"> <i class="fa fa-exclamation" style="color:red"> Your Cart is Empty </i> </div>
<?php 
}
?>

       
</div>
</div>
</div>
 </div>
    




             
<div class="row">
  <div class="column">
    
      <form action="index.php">

            <h2 class="billing">Billing Address</h2>
            <i class="fa fa-user"></i> Full Name <br>
                <input type="text" id="fullname" name="firstname" placeholder="Peter.K.Ambrose" required> <br>
            <i class="fa fa-envelope"></i> Email <br>
                <input type="email" name="email" placeholder="Enter your email" required> <br>
            <i class="fa fa-address-card-o"></i> Address <br>
                <input type="text" id="adr" name="address" required> <br>
            <i class="fa fa-globe"></i> Country <br>
                <input type="text" id="country" name="country" value="Sri Lanka" readonly><br>
            <i class="fa fa-phone"></i> Telephone Number <br>
            <input type="text" id="phonefield"  value="" name="phone" onkeyup=" return validatephone(this.value); " required/> <br>
            <i class="fa fa-institution"></i> City <br>
                <input type="text" id="city" name="city" placeholder="Dehiwela" required><br>
            Zip <br>
                <input type="text" id="zip" name="zip" maxlength="5" required><br>
             
            </div>
          

          <div class="column">
            <h2 class="billing">Payment Details</h2>
            Accepted Cards
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-paypal" style="color:darkslateblue;"></i>
            </div>
            Name on Card <br>
            <input type="text" id="cname" name="cardname" required> <br>
            Credit card number <br>
            <input type="text" id="ccnum" name="cardnumber"  maxlength="16"   required> <br>
            Expiry Month<br>
            <select name = "months"  required>
            <option value = "January">January</option>
            <option value = "February">February</option>
            <option value = "March">March</option>
            <option value = "April">April</option>
            <option value = "May">May</option>
            <option value = "June">June</option>
            <option value = "July">July</option>
            <option value = "August">August</option>
            <option value = "September">September</option>
            <option value = "October">October</option>
            <option value = "November">November</option>
            <option value = "December">December</option>
            </select> <br><br>
            Expiry Year<br>
            <input list="exp_year" ><br>
            <datalist id="exp_year">
                    <?php 
                         $right_now = getdate();
                         $this_year = $right_now['year'];
                         $end_year=2030;
                            while ($this_year <= $end_year) {
                                   echo "<option>{$this_year}</option>";
                            $this_year++;
                             }
                     ?>
            </datalist>
            </input> <br>
            CVV<br>
            <input type="text" id="cvv" name="cvv" maxlength="3"  placeholder="Enter 3 digit code"  required> <br>
              <input type="submit" value="Proceed to checkout" name="bill_user" onclick="mycheckout()" class="btn">
     
          </div>
        </form> 
      </div>
 
 <script>
     function mycheckout() { 
         alert("Your order has been received. Check your email to receive your order ID");
     }	
 </script>
    
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


</body>
</html>