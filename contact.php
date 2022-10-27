

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width =device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Sparks - Contact </title>
 <style>
 body {
    background-image: url("images/about.jpg");
}
        
.leftcolumn {   
  float: left;
  width: 55%;
  padding:0px 0 20px 40px; 
}

.rightcolumn {
  float: left;
  width: 45%;
  padding:210px 40px 0px 40px;
}

h2{
    text-align:center;
    font-family: Times, Times New Roman, serif;
    font-size: 40px;
    text-decoration:underline;
    font-weight:700;
}
.style{
    font-family: inherit ;
    font-weight:600;
    font-size: 15px;
    text-align:center;
}
.contact{
    padding: 20px;
   margin-top: 20px;
   background-color:white;
   text-align:center;
}
.card {
   padding: 20px;
   margin-top: 20px;
   background-color:lightgrey;
   text-align:center; 
}

.card img{
    width:300px;
}

.card a{
    font-size:20px;
    font-family: cursive ;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.feedback{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
   margin-top: 20px;
}

input[type=email],[type=text], textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

  
.submit{
  background-color: seagreen;
  color: white;
  padding: 12px 20px;
  margin: 10px 0;
  cursor: pointer;
  border-radius:4px;
  font-size:15px;
}
.submit:hover {
  background-color: green;
}

  @media screen and (max-width: 700px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>

</head>
<body>
    

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
               <a href="login.php" target="_blank"> Login</a>
               <a class="active" href="contact.html">Contact</a>  
                   
             </nav>
             <div class="search-right">
                <form class="search" method="POST" action="search.php" style=" margin:auto">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                
                </form>
                 
             </div>
             
        <div class="cart-right">
            <a href="cart.php" >
          <span class="fa fa-shopping-cart"></span> Your Cart </a>
       </div>
    </div>

    
    
    
    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2>VISIT US AT</h2>
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.46974296471!2d79.86467323630865!3d6.876530886917595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25b3ae57fb6b9%3A0x40eaa48210b1b527!2sSparks!5e0!3m2!1sen!2slk!4v1587481814187!5m2!1sen!2slk" width="500" height="350" allowfullscreen=""  tabindex="0"></iframe>
                 <p class="style"> Address : No. 15 Kinross Ave, Colombo 04 <br> </p>
                 <em>Open Daily From 9am -10pm except on Poya Days and Special Holidays! </em>
            </div>
            
        <div class="feedback">
            <h2>FEEDBACK</h2>
            <p class="style">We would love to hear from you...Please drop us a message in here! </p>
            <?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>       
            <form action="feedback.php" method="POST">
                     
                        Email:
                        <input type="email" id="email" name="email" placeholder="Enter your email address..." required>
                        Comment Your Feedback
                        <textarea id="feedback" name="feedback" placeholder="Write something..." style="height:200px" required></textarea> <br>
                        <button type="submit" class="submit" value ="submit" >SUBMIT</button>
                    </form>
          </div>
        </div>
        
        <div class="rightcolumn">
                <div class="contact">
                    <h2>Contact Us</h2>
                    
                    For more details call us: <br>
                    <i class="fa fa-phone-square" style=" font-size:15px"> </i> 011-272-1234 <br> </b>
                    <i class="fa fa-mobile" style="font-size:20px"></i> 077-353-610 <br> <br>
                   Or Email us on : <i class="fa fa-envelope" style=" font-size:15px"> </i> sparks@gmail.com
                    
                </div>
                <div class="card">
                    <img src="images/socialmedia.png">
                     <h2>Follow Us On</h2>
                     <a href="https://www.facebook.com/sparksofficial/" target="_blank"><i class="fa fa-facebook-official" style="color:blue; font-size:40px"></i> FaceBook</a> <br>
                     <a href="https://www.instagram.com/sparks_official/?hl=en" target="_blank"> <i class="fa fa-instagram" style="color:magenta; font-size:40px"></i> Instagram </a> <br>
                     <a href="https://twitter.com/sparksofficial?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter-square" style="color:#00acee; font-size:40px" ></i> Twitter </a>
                </div>
        </div>
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

</body>
</html>


