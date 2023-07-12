<?php
session_start();
include 'config.php';

$user_type=$_SESSION["user_type"];
$customer_name=$_SESSION["customer_name"];
// $package_id=$_POST["package_book_button"];
$_SESSION["package_id"]=$_POST["package_book_button"];

// echo $package_id;
// echo $user_type;
// echo $customer_name;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="card.css">
 
</head>
<body>
      <h1>This is the list of all the Barbers, Choose any one</h1>


      </body>
</html>

<?php
$conn= new mysqli($server,$username,$password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }





  
  
$sql2="SELECT * FROM barbers";
if ($res2 = mysqli_query($conn, $sql2)) {
    if (mysqli_num_rows($res2) > 0) {
        
        echo "<div class='conatiner'style=' color:white !important'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12'>";
        echo "<table class='table table-striped shopkeeperTable table-hover' style='color:white'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Full Name</th>";
        echo "<th>Email</th>";
        echo "<th>Mobile Number</th>";
        echo "</tr>";
        echo "</thead";
        echo "<tbody>";
        
        $count=1;
        while ($row2 = mysqli_fetch_array($res2)) {
            
            
            
            echo "<tr>";
            echo "<td>".$row2['name']."</td>";
            echo "<td>".$row2['email']."</td>";
            echo "<td>".$row2['mobile_number']."</td>";
            echo "<td><form action='barbers_customers_packages.php' method='POST'>";
            echo " <button type='submit' class='btn btn-outline-primary' name='barber_book_button' value='".$row2['barber_id']."'>Book</button>";
            echo "</form></td>";
            echo "</tr>";
        
        }
        echo "</tbody>";
        echo "</table> </div></div></div>";
        mysqli_free_result($res2);
    }
    
    else{
        echo "Error";
    }
}


$customer_id;

$sql3="SELECT customer_id FROM customers WHERE name='$customer_name'";

$res3 = $conn->query($sql3);

if ($res3->num_rows > 0) {
  while($row = $res3->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    $customer_id=$row['customer_id'];
  }
} else {
  echo "0 results";
}


$_SESSION["customer_id"]=$customer_id;




// echo $barber_id;
// echo $customer_id;
// echo $_SESSION["package_id"];   



















// $sql= "INSERT INTO `form`.`barbers_customers` (`barber_id`,`customer_id`,`package_id`) VALUES ('$barber_id','$customer_id','$package_id')";
// if(mysqli_query($conn, $sql))
// {
//   // echo "Data entered successfully";
//    echo "<script> alert(`REGISTRATION SUCCESFUL`)</script>";
//    echo "<script>window.location.assign('login.html')</script>";
// }
// else{
//    echo "Data did not enter successfully";
// }

