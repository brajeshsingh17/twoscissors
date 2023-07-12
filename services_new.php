<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="style1.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    

        <style>



        </style>
</head>
<body>

   <!--Header  -->
    <header>
      <div class="wrappers">
        <div class="brands">
          <a href="#hero3">
            <h1>Tw<span>o</span> Scissor<span>s</span></h1>
          </a>
        </div>
        <nav>
          <a href="index.html" data-after="Home">Home</a>
          <a href="services.html" data-after="Services">Services</a>
          <a href="About.html" data-after="About Us">About Us </a>
          <a href="register.html" data-after="Appointment">Signup</a>
          <a href="contact.html" data-after="Contact">Contact</a>
        </nav>
      </div>
    </header>
  <!--End Header  -->

  <!-- starting booking form -->
  <!-- <section id="hero3"> -->
        <!-- <div class="hero3 container-2"> -->
     <div class="container"  style="padding-top:100px">
    <div class="wrapper">
      
      <div class="Form">
        <div class="title">
            Booking Form
        </div>

        <form action="" method="POST">
        <div class="input_Field">
            <label for="Name" >Name </label>
            <input type="text" class="input" id="Name" name="Name" required>
        </div>
        <div class="input_Field">
            <label for="Mobile">Mobile </label>
            <input type="text" class="input" id="Mobile" name="Mobile" pattern="[0-9]{10}"  required>
        </div>
       <div class="input_Field">
            <label for="Email" >E-mail </label>
            <!-- <input type="text" class="input" id="Email" name="Email" required> -->
            <input type="email" class="input" id="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>
        
  <div class="input_Field">
    <label for="Gender" >Gender </label>
    <div class="custom_select">
        <select name="Gender" id="Gender" name="Gender"  required>
            <option value=""></option>
            <option value="male"  >Male</option>
            <option value="Female"  >Female</option>
        </select>
    </div>
</div>
<div class="input_Field">
    <label >Select a Service</label>
    <div class="custom_select">
  <select name="Service" id="Service" name="Service" required>
    <option value="volvo"></option>
    <option value="Kids: Boys 12 & Under"> Kids: Boys 12 & Under</option>
    <option value="Single Process (Regular)"> Single Process (Regular)</option>
    <option value=" Single Process (w/ Haircut)">  Single Process (w/ Haircut)</option>
    <option value="Double Process">   Double Process </option>
    <option value=" Partial Highlights">  Partial Highlights </option>
    <option value=" Full Head Highlight (w/ Haircut)">   Full Head Highlight (w/ Haircut)  </option>
    <option value=" Standard Manicure">   Standard Manicure  </option>
    <option value=" Express Pedicure">   Express Pedicure </option>
    <option value="Spa Pedicure">   Spa Pedicure </option>
    <option value=" Curled or Flattened">  Curled or Flattened</option>
    <option value="     Straightening">     Straightening</option>

</select>
</div>

</div>

<div class="input_Field">
    <label for="Date">Date</label>

    <!-- <div class="dt">
  <input type="date" id="Date" name="Date" required> -->
  <div class="form-group">
  <label for="rank" class="cols-sm-2 control-label">Date</label>
   <div class="cols-sm-10">
    <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
     <input type="date"  id="txtDate" required="Required" class="form-control" name="txtDate" placeholder="Select suitable date" />
    </div>
  </div>
</div>

<script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("txtDate")[0].setAttribute('min', today); 
</script>

<!-- </div> -->
</div>

<div class="input_Field">
    <label for="appt"> Time</label>
    <div class="dt">
  <input type="time" id="Time" name="Time" required>
</div>
</div>
<div class="input_Field">
    <label >Address </label>
    <textarea class="textarea" id="Address" name="Address" required></textarea>
</div>
<div class="input_Field">
    <input type="submit" name="submit" value="Book"  class="btn">
</div>
</form>
  
    
    </div>
<!-- </div> -->

</div>
<!-- </section> -->

</div>
</body>
</html>


<?php
include 'connect.php';
if(isset($_POST['submit'])){
$Name = $_POST['Name'];
$Mobile = $_POST['Mobile'];
 $Email = $_POST['Email'];
 $Gender = $_POST['Gender'];
 $Service = $_POST['Service'];
 $Date = $_POST['Date'];
 $Time = $_POST['Time'];
 $Address = $_POST['Address'];

$insertquery=" insert into customer(Name,Mobile,Email,Gender,Service,Date,Time,Address) values('$Name','$Mobile','$Email','$Gender','$Service','$Date','$Time','$Address') ";

$res= mysqli_query($con,$insertquery);

if($res){
    ?>
      <script>
          alert("Details Submitted ");
          window.location.assign('index.html')
      </script>
    <?php
}else{
    ?>
      <script>
          alert("Details not Submitted ");
      </script>
    <?php
}

}

?>



