<?php
session_start();
$Email = $_SESSION["email"];/* userid of the user */
$con = mysqli_connect('localhost','root','12345','sparks') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from customer WHERE email='" . $Email . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["passwrd"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query($con,"UPDATE customer set passwrd='" . $_POST["newPassword"] . "' WHERE name='" . $Email . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>

</head>
<body>
<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
<br>=
<br>
</body>
</html