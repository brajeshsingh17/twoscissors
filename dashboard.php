<?php
session_start();
include 'config.php';


$user_type=$_SESSION["user_type"];

// $barber_name=$_SESSION["barber_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
    crossorigin="anonymous"
  />

  <link rel="stylesheet" href="card.css">
  <!-- <link rel="stylesheet" href=".css"> -->
</head>
<body>
    
<!-- <div class="top-content row">
      <div class="col-md-11">
          
      </div>
      <div class="col-md-1">
        <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
      </div>
    </div><br><br> -->
    <!-- <img src="pg/1.jpg" alt="" class="img-fluid"> -->
    
    
    
    
    
    
    
    
    
    <!-- PHP Starts here -->
    
    <?php


if($user_type=="customer"){
  $customer_name=$_SESSION["customer_name"];
    echo '<div class="top-content row">
    <div class="col-md-11">
        
      <h1 class="text-left" style="display: inline">Welcome , '.$customer_name.'</h1>
      
    </div>
    <div class="col-md-1">
      <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
    </div>
  </div><br><br>';

    $conn= mysqli_connect($server,$username,$password,$database);
    
    if ($conn === false) {
        die("ERROR: Could not connect. "
        .mysqli_connect_error());
    }
    $sql="SELECT * FROM packages";
    $sql2="SELECT * FROM barbers";
    
   echo '<div class="conatiner-fluid card-container">';
    echo'<div class="row">';

if ($res = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        
        $count=1;
        while ($row = mysqli_fetch_array($res)) {
            $package_id=$row['package_id'];
            // $_SESSION["package_id"]=$row['package_id'];
            $image_name="pg/".$count.".jpg";
            echo '<div class="col-md-4">
            <div class="card card-1">
            <h2>'.$row['package_name'].'</h2>
            <img src="'.$image_name.'" class="img-fluid" height="50px">
            <br>
            <p>Price : <span>'.$row['price'].' rupees</span></p>
            <p>Description : <span> '.$row['description'].'</span></p>
            <form action="barber_table.php" method="POST">
            <button class="btn btn-outline-success card_book button" id="button_'.$package_id.'" value="'.$package_id.'" type="submit" name="package_book_button">Book</button>
            </form>
            </div> 
            </div>';
             $count++;

        }
        echo "<br></div>";
        // echo $_SESSION["package_id"];
        mysqli_free_result($res);
    }
    else {
        echo "No matching records are found.";
    }


}
// else {
//     echo "ERROR: Could not able to execute $sql. "
//                                 .mysqli_error($conn);
// }




// if ($res2 = mysqli_query($conn, $sql2)) {
//     if (mysqli_num_rows($res2) > 0) {
        
//         echo "<table class='table table-striped shopkeeperTable' style='display:none;'>";
//         echo "<thead>";
//           echo "<tr>";
//           echo "<th>Full Name</th>";
//           echo "<th>Email</th>";
//           echo "<th>Mobile Number</th>";
//           echo "</tr>";
//           echo "</thead";
//           echo "<tbody>";
        
//           $count=1;
//         while ($row2 = mysqli_fetch_array($res2)) {

        
          
//             echo "<tr>";
//             echo "<td>".$row2['name']."</td>";
//             echo "<td>".$row2['email']."</td>";
//             echo "<td>".$row2['mobile_number']."</td>";
//             echo "<td>  <button class='btn btn-outline-primary'>Book</button></td>";
//             echo "</tr>";
//             $count++;
//         }
//         echo "</tbody>";
//         echo "</table> </div>";
//     mysqli_free_result($res2);
    // else {
    //     echo "No matching records are found.";
    // }


}




else{



    // echo "Barber page";
    $barber_name=$_SESSION["barber_name"];

    echo '<div class="top-content row">
    <div class="col-md-11">
        
      <h1 class="text-left" style="display: inline">Welcome , '.$barber_name.'</h1>
      
    </div>
    <div class="col-md-1">
      <button class="btn btn-outline-danger" onclick="logout()">Logout</button>
    </div>
  </div><br><br>';


       echo "<div class='conatiner' style='color:white !important'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12'>";
        echo "<table class='table table-striped shopkeeperTable table-hover' style='color:white'>";
        echo "<thead>";
        echo "<tr>";
        // echo "<th>S No.</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Mobile Number</th>";
        echo "<th>Email</th>";
        echo "<th>Package Name</th>";
        echo "<th>Package Price</th>";
        echo "</tr>";
        echo "</thead";
        echo "<tbody>";

    $conn= mysqli_connect($server,$username,$password,$database);

    $barber_id;

    $sql4="SELECT barber_id FROM barbers WHERE name='$barber_name'";
    
    $res4 = $conn->query($sql4);
    
    if ($res4->num_rows > 0) {
      while($row = $res4->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    
        $barber_id=$row['barber_id'];
        // echo $barber_id;
      }
    } else {
      echo "0 results";
    }


    $sql5="SELECT customer_id,package_id FROM barbers_customers WHERE barber_id='$barber_id'";

    $res5 = $conn->query($sql5);
    
    if ($res5->num_rows > 0) {
      while($row = $res5->fetch_assoc()) {
    
        // echo $row['customer_id'],$row['package_id'];
        $customer_id_new=$row['customer_id'];
        $package_id_new=$row['package_id'];
        $customer_name_new;
        $customer_mobile;
        $customer_email;

        $sql6="SELECT name,email,mobile FROM customers WHERE customer_id='$customer_id_new'";

        $res6 = $conn->query($sql6);

        $sql7="SELECT package_name,price FROM packages WHERE package_id='$package_id_new'";

        $res7 = $conn->query($sql7);
    
        if ($res6->num_rows > 0 && $res7->num_rows>0) {
            // $count_new=1;
            while(($row2 = $res6->fetch_assoc())&&($row3 = $res7->fetch_assoc())) {
              
             $customer_name_new = $row2["name"];
             $customer_mobile=$row2["mobile"];
             $customer_email=$row2["email"];
             $package_name_new = $row3["package_name"];
             $package_price=$row3["price"];
             
             echo "<tr>";
            //  echo "<td>".$count_new."</td>";
             echo "<td>".$customer_name_new."</td>";
             echo "<td>".$customer_mobile."</td>";
             echo "<td>".$customer_email."</td>";
             echo "<td>".$package_name_new."</td>";
             echo "<td>".$package_price."</td>";
             echo "</tr>";
             
            //  $count_new++;


            }
        }


        // if ($res5->num_rows > 0) {
        //     while($row = $res5->fetch_assoc()) {
              
        //        $package_name_new = $row["package_name"];
        //        $package_price=$row["price"];
        //     }
        // }

      }
    }
    else{
        echo "0 results";
    }


    echo "</tbody>";
    echo "</table> </div></div></div>";
}




mysqli_close($conn);




?>




<script>

// const showTable=function(){
//   document.querySelector('.shopkeeperTable').style.display="block";

// window.location.assign('barber_table.php')
// }

const logout=function(){
    window.location.assign('index.html');
}


// $(`.button`).click(function(){
//   $.ajax({
//   type: "POST",
//   url: 'barber_table.php',
//   data: ,
//   dataType: 'json'
// }).done(function(response) {
//       if (response.success) {
//         alert("Success");
//       }
// });
// });
// $(document).ready(function() {
//   alert($("*[name='button']").attr('id'));
// });


// var id = ( typeof (el = document.querySelectorAll("[name=button]")) != "undefined" ) ? el.getAttribute("id"):"Element does not exist";
// console.log(id);

</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>



<!-- <script>
var myVar = "test";

$. ajax({
url: "test.php",
type: "POST",
data:{"myData":myVar}
}). done(function(data) {
console. log(data);
});
</script> -->


