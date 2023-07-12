<?php
$username ="root";
$password ="";
$server = 'localhost';
$db = 'form';
$con= mysqli_connect($server,$username,$password,$db);
if($con){
    // echo "Sucess";
?>

<?php
}else{
   
    die("No Connection" .mysqli_connect_error());
}
?> 
