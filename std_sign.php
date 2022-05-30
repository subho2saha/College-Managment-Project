<?php 

$sure = false;
$dif_pass=false;
$flag3=false;
if(isset($_POST['btn'])) {

$server="localhost";
$username="root";
$password="";
$database="trip";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con)
{
    die ("connection failed due to " . mysqli_connection_error);
}
else{
    // echo "successfully connected";
   
}


$uname = $_POST['uname'];
$pword = $_POST['pword'];
$c_pword=$_POST['c_pword'];

$sql1 = "SELECT * FROM `login1` WHERE username = '$uname';";
$res1 = mysqli_query($con, $sql1);
$num_of_row1 = mysqli_num_rows($res1);

if($num_of_row1 >= 1){
    // user not exist
    $flag3 = true;
} 
else{

if( $pword == $c_pword)
{
    $sql = "INSERT INTO `login1` ( `username`, `password`, `date`) VALUES ( '$uname', '$pword', CURRENT_TIMESTAMP);";
    $res = mysqli_query($con, $sql);
    
    if($res){
        $sure = true;
    }
    else{
        echo "unsuccessfully";
    }
    
    $con->close();
}
else{
    $dif_pass=true;
    // echo "password doesnot same";
}
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student sign-in</title>
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<link rel=" preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>

<body>
<div class="navi">
        <!-- <ul>
            <li> <a href="adhome.php">Home</a> </li>
            <li><a href="#">About</a> </li>
            <li><a href="#">Services</a> </li>
            <li><a href="#">Contact us</a> </li>
            <div class="searchbox">
                <input type="text" name="search" id="search" placeholder="Search this webside">
                <button>search</button>
            </div>
        </ul>
    </div> -->

    <div class="container">
        <form action="std_sign.php" method="post">
        <img class="logo" src="techno_logo.jpg" alt="can't load image">
        <h2>TECHNO INTERNAIONAL NEWTOWN</h2>
        <?php
        
         if ( $sure == true ) {
         echo " <h5> Student added successfully </h5> ";   
         }
         if ( $dif_pass == true ) {
            echo " <h5> Same password required </h5> ";  
            }
        if ( $flag3 == true ) {
            echo " <h5> Username already exist </h5> ";  
            }

        ?>
        <h4>Student Username</h4>
        <input type="text" name="uname" placeholder="Enter your name here">
        <h4>Password</h4>
        <input type="password" name="pword"  placeholder="Enter password here">
        <br>
        <h4>Confirm password</h4>
        <input type="password" name="c_pword"  placeholder="Enter same password again">
        <br>
        <button class="btn" name="btn">Sign In</button>
        <br>
        
        
        
    </form>
    </div>
</body>
</html>