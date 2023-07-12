<?php
include 'config.php';
 
 $conn= mysqli_connect($server,$username,$password);
 if(!$conn)
 {
     echo "Can't connect to database";
 }
 
     //echo "Connection successful";
     
     $name=$_POST["name"];
     $email=$_POST["email"];
     $password=$_POST["password"];
     $mobile_number=$_POST["mobile_number"];
     $gender=$_POST["gender"];
     $user_type=$_POST["user_type"];
    //  $nature_of_material=$_POST["nature_of_material"];
    //  $weight_of_material=$_POST["weight_of_material"];
    //  $quantity=$_POST["quantity"];
    //  $city =$_POST["dealer_city"];
    //  $state=$_POST["dealer_state"];
    //  $user_type="dealer";
   if($user_type=="barber")
   {
    $sql= "INSERT INTO `form`.`barbers` (`name`,`email`,`password`,`mobile_number`,`gender`,`user_type`) VALUES ('$name','$email','$password','$mobile_number','$gender','$user_type')";
         if(mysqli_query($conn, $sql))
        {
           // echo "Data entered successfully";
            echo "<script> alert(`REGISTRATION SUCCESFUL`)</script>";
            echo "<script>window.location.assign('login.html')</script>";
        }
        else{
            echo "Data did not enter successfully";
        }
    }
    else{
        $sql= "INSERT INTO `form`.`customers` (`name`,`email`,`mobile`,`gender`,`user_type`,`password`) VALUES ('$name','$email','$mobile_number','$gender','$user_type','$password')";
        if(mysqli_query($conn, $sql))
       {
          // echo "Data entered successfully";
           echo "<script> alert(`REGISTRATION SUCCESFUL`)</script>";
           echo "<script>window.location.assign('login.html')</script>";
       }
       else{
           echo "Data did not enter successfully";
       }
   }
    
?>

