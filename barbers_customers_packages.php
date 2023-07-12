<?php
session_start();
include 'config.php';

$user_type=$_SESSION["user_type"];
$customer_id=$_SESSION["customer_id"];
$package_id=$_SESSION["package_id"];
$barber_id=$_POST["barber_book_button"];


$conn= new mysqli($server,$username,$password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql= "INSERT INTO `form`.`barbers_customers` (`barber_id`,`customer_id`,`package_id`) VALUES ('$barber_id','$customer_id','$package_id')";
if(mysqli_query($conn, $sql))
{
  // echo "Data entered successfully";
   echo "<script> alert(`SUCCESFULLY BOOKED`)</script>";
   echo "<script>window.location.assign('index.html')</script>";
}
else{
   echo "Data did not enter successfully";
}

?>