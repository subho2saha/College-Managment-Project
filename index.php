<?php
 $insert = false;
 if(isset($_POST['btnn'])){
    header("location: sthome.php");
 }
 
if(isset($_POST['btn'])){
    
$server="localhost";
$username="root";
$password="";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to the database failed due to" . mysqli_connection_error);
}

    // echo"Successfully connected";

    $name = $_POST['name'];
    $stream = $_POST['stream'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `stream`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$stream', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP());";

    // echo $sql;


    if($con->query($sql) == true)
    {
        //  echo "Succesfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }


    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip form fill up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="addcss.css">
    
</head>

<body>
    <img class="bg" src="clg_trip.jpeg" alt="photo  can't lode" >
   
    <div class="container">
        <br>
        <br>
        <h2>Wellcome to TINT trip </h2>
        <br>
        <p>Enter your details to conform your participation</p>
        <br>

        <?php 
        if($insert == true)
        {
         echo "<p class='submitmsg'> Thanks for submitting this form. We are happy to see you joining with us  </p>" ;
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name here">
            <input type="text" name="stream" id="stream" placeholder="Enter your stream here">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender here">
            <input type="email" name="email" id="email" placeholder="Enter your email id here">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number here">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here "></textarea>
            <br>
            
            <button class="btn" name="btn">Submit</button>
            <br>
            <button class="btnn" name="btnn">Back to home</button>
            <br><br>
            <!-- <button class="btnn" name="btnn">Back to login page</button> -->
            
        </form>
        
    </div>
    <script src="index.js"></script>
    
</body>
</html>