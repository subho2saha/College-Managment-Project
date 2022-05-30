<?php 

$flag1 = false;
$flag2=false;
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
    //  echo "successfully connected";
}


$uname = $_POST['uname'];
$pword = $_POST['pword'];



    $sql1 = "SELECT * FROM `login2` WHERE username = '$uname';";
    $res = mysqli_query($con, $sql1);
    $num_of_row = mysqli_num_rows($res);

    if($num_of_row < 1){
        // user not exist
        $flag1 = true;
    } 
    else{
        // user exist
        $sql2 = "SELECT * FROM `login2` WHERE username = '$uname' and password = '$pword';";
        $res2 = mysqli_query($con, $sql2);
        $num_of_row2 = mysqli_num_rows($res2);

        if($num_of_row2 >= 1)
        {
                // username exist with right password so go to trip form page
                     header("location: adhome.php"); 
        }
        else{
                // username exist but wrong correct password
                $flag2=true;
        }   
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
    <title>admin login</title>
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

    <div class="container">
        <form action="admin_login.php" method="post">
        <img class="logo" src="techno_logo.jpg" alt="can't load image">
        <h2>TECHNO INTERNAIONAL NEWTOWN</h2>
        <?php
        
         if ( $flag1 == true ) {
         echo " <h5> User not exist please sign-in first </h5> ";
         }

         if ( $flag2 == true ) {
            echo " <h5> Wrong password given </h5> ";
            }
        ?>
        <h4>Admin Username</h4>
        <input type="text" name="uname" placeholder="Enter username">
        <h4>Password</h4>
        <input type="password" name="pword"  placeholder="Enter password">
        <br>
        <button class="btn" name="btn">login</button>
        <br>
        <br>
        <br>
        <br>
        <a href="admin_sign.php">Don't sign-in?? cleck here to sign-in...</a>
    </form>
    </div>
</body>
</html>