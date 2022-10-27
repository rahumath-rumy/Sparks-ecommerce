<?php include('database.php') ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width =device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Sparks - Login </title>
<style>
  body{
	margin: 0 auto;
	background-image: url("images/logingrnd.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
      }
      
h1{
     color: mediumvioletred;  
      font-family: cursive;
    font-size: 30px;
    text-align:center;
  }
      
.login{
       padding-left: 100px;
       padding-right:100px;
       width: 450px;
       height: 500px;
       text-align:left;
       margin: 0 auto;
       background-color: powderblue ;
       margin-top: 40px;
}

.login img{
	width: 100px;
	height: 100px;
	margin-top:40px;
       display: block;
        margin-left: auto;
        margin-right: auto;
}

.loginbtn {
  background-color: white;
  color: black;
  padding: 5px 5px;
  margin: 10px 0;
  border-radius: 4px;
  cursor: pointer;
  width: 40%;
  font-size:15px;
}

.loginbtn:hover{
    background-color:lightsalmon ;
    
}

  input[type=text], input[type=password], input[type=email] {
  width: 110%;
  padding: 10px;
  opacity :0.7;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
}

input[type=text]:focus, input[type=password]:focus, input [type=email]:focus {
  background-color: lightgray;
  outline: none;
}


</style>
</head>
    <body>
      
       <div class="login">
           <img src="images/loginn.jpg"> 
           <h1> LOGIN </h1>
           <p style="text-align:center; font-weight:bold"><em>Don't have an account?<br> Click <a href="reg.php"> SignUp </a> </em> </p>
            <form action="login.php" method="POST">
                <?php include('errors.php'); ?>
                <div class="logdetail">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <b>Username </b> <input type="text" name="username" placeholder="Enter username" required >
                    <b>Password </b> <input type="password" name="password" placeholder="Enter password" required>
           
                     <button type="submit" class="loginbtn" value ="login" name="login_user">  Login </button> 
                     <i class="fa fa-question-circle" aria-hidden="true">  <a href="fp.html" > Forgot Username/Password </a></i>
                
                 </div>
            </form>
       </div>
    </body>
    
          
</html>