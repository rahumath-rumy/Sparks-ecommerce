<?php
session_start();

// initializing variables
$username = "";
$fname="";
$lname="";
$email    = "";

$db = mysqli_connect('localhost', 'root', '12345', 'sparks');

if (isset($_POST['bill_user'])) {
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $cardname = mysqli_real_escape_string($db, $_POST['cardname']);
  $cardnumber = mysqli_real_escape_string($db, $_POST['cardnumber']);
  $expyear = mysqli_real_escape_string($db, $_POST['expyear']);
  $cvv = mysqli_real_escape_string($db, $_POST['cvv']);

  $query = "INSERT INTO billing (fullname,email,address,phone,city,zip,cardname,cardnumber,expyear,cvv)
  			  VALUES('$fullname', '$email','$address', '$phone', '$city','$zip','$cardname', '$cardnumber', '$expyear','$cvv')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
