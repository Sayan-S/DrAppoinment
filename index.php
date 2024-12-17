<?php
$insert = false;
if(isset($_POST['name'])){
//     // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

//     // Collect post variables
    $index=
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $specialization= $_POST['specialization'];
    $appointment_date= $_POST['appointment_date'];
    $preferred_doctor= $_POST['preferred_doctor'];


    $sql = "INSERT INTO `drbooking`.`drbooking` ( `name`, `age`, `gender`, `email`, `phone`, `specialization`, 
    `appointment_date`, `doctor_name`, `others`, `dt`) VALUES 
    ( '$name', '$age', '$gender', '$email', '$phone', '$specialization', '$appointment_date', '$preferred_doctor', '$desc', current_timestamp())";

    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

//     // Close the database connection
    $con->close();
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

  
  
  <nav class="navbar">
    <div class="logo">
      <a href="#">Mission Hosptal</a>
    </div>
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#book">Book Appointment</a></li>
    </ul>
    <!-- Hamburger Menu Icon -->
    <div class="hamburger" id="hamburger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
  </nav>

  <!-- xxxxxxxxxxxx -->

    <div class="container">
        
        <?php
        if($insert == true){
          echo "<p class='submitMsg' style='color: #32CD32; font-weight: bold;'>Your Booking has been done Sucesfully.</p>";
        } 
        ?>
        <h1>Doctor Appointment Booking</h1>

        <form action="index.php" method="post">
            <!-- <input type="text" name="name" id="name" placeholder="Enter your name"> -->
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your full name" required>

            <!-- <input type="text" name="age" id="age" placeholder="Enter your Age"> -->
            <label for="age">Age</label>
            <input type="text" name="age" id="age" placeholder="Enter your age" min="1" required>

            <!-- <input type="text" name="gender" id="gender" placeholder="Enter your gender"> -->
            <label for="gender">Gender (Male/Female/Other)</label>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>

            <!-- <input type="email" name="email" id="email" placeholder="Enter your email"> -->
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>

            <!-- <input type="phone" name="phone" id="phone" placeholder="Enter your phone"> -->
            <label for="phone">Phone Number</label>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required>

            <label for="specialization">Doctor Specialization (e.g., Cardiologist, Pediatrician)</label>
            <input type="text" name="specialization" id="specialization" placeholder="Enter doctor specialization" required>

            <label for="appointment_date">Preferred Appointment Date (YYYY-MM-DD)</label>
            <input type="text" name="appointment_date" id="appointment_date" placeholder="Enter preferred appointment date (e.g., 2024-12-25)">


            <label for="preferred_doctor">Preferred Doctor Name</label>
            <input type="text" name="preferred_doctor" id="preferred_doctor" placeholder="Enter preferred doctor name (optional)">

            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> -->
            <label for="desc">Additional Information</label>
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter any additional information"></textarea>

            <!-- <button class="btn">Submit</button>  -->
            <button type="submit" class="btn">Book Appointment</button>
        </form> 
    </div>
    <div class="footer">
      &copy; 2024 Doctor Booking System
    </div>
    <script src="index.js"></script>
  
</body>
</html>



