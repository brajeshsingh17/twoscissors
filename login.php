<?php

session_start();
$user_type=$_POST['user_type'];

if($_POST["type"]=="service"){
    header("Location: services_new.php");
   exit;

}
if($user_type=="")
{
    echo "<script>alert(`Please select user type`)</script>";
    echo "<script>window.location.assign('login.html')</script>";
}


include 'config.php';

$conn= mysqli_connect($server,$username,$password);
if(!$conn)
{
    echo "Can't connect to database";
}

else
{
$email=$_POST['email'];
$password=$_POST['password'];
// $database=`goods_transportation_service`;

if($user_type=="barber")
{
$sql="SELECT * FROM `form`.`barbers` WHERE email='$email'";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
$_SESSION["barber_name"]=$row["name"];
$_SESSION["user_type"]=$row['user_type'];

        if($row['password']==$password)
            {
                echo "<script>window.location.assign('dashboard.php')</script>";
                // echo $_SESSION["user_type"];
            }
        else
            { 
                echo "<script>alert(`Incorrent email or password`)</script>";
                echo "<script>window.location.assign('login.html')</script>";
            }
            $conn->close();

 }

else{
//    echo "<script>alert('asasa')</script>";
    $sql="SELECT * FROM `form`.`customers` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
    $_SESSION["customer_name"]=$row["name"];
    $_SESSION["user_type"]=$row['user_type'];
    // $_SESSION["driver_city"]=$row["city"];
    // $_SESSION["dealer_state"]=$row["state"];


        if($row['password']==$password)
            {
                echo "<script>window.location.assign('dashboard.php')</script>";
            }
        else
            { 
                echo "<script>alert(`Incorrent email or password`)</script>";
                echo "<script>window.location.assign('index.html')</script>";
            }
            $conn->close();
}
}
?>