<?php
$Email=$_POST ['email'];
$Feedback=$_POST ['feedback'];
if ( !empty($Email) || !empty($Feedback) ){
        $hostname ="localhost";
        $username="root";
        $password="12345";
        $dbname="sparks";
        
        $connection= new mysqli ($hostname,$username,$password, $dbname);
           
           if ($connection-> connect_error)
           {
               die ("Error in connection");
           
           } else {
     $INSERT = "INSERT into feedback (email,  feedback) values(?, ?)";
   
      $sql = $connection->prepare($INSERT);
      $sql->bind_param("ss",$Email, $Feedback);
      $sql->execute();
      
      echo '<script> alert ("Thank you for your feedback! We will get back to you on it! " );window.location="index.php"; </script>';
     
     } 
     $sql->close();
     $connection->close();
 die();
}
?>


 