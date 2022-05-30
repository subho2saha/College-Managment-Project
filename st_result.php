<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">

    <title>view result</title>
    <style>
        * {
            font-family: 'Josefin Sans', sans-serif;
            margin: 0px;
            padding: 0px;
        }

        .navi {
            background-color: rgb(0, 0, 0);
            border-radius: 5px;
        }

        .navi ul {
            overflow: auto;
        }

        .navi li {
            float: left;
            list-style: none;
            margin: 20px;
        }

        .navi li a {
            color: blanchedalmond;
            text-decoration: none;
        }



        .con {
            background-color: bisque;
            /* border: 2px solid green; */
            height: 565px;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .con .firstbox {

            position: fixed;
            display: flex;
            height: 280px;
            /* border: 2px solid red; */
            width: 420px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 50px;
        }

        .con .firstbox #btn {
            height: 35px;
            width: 80px;
            border-radius: 5px;
            margin: 15px;
            cursor: pointer;

        }

        .con .firstbox #btn:hover {
            opacity: 0.8;
        }

        .con .firstbox input {
            height: 20px;
        }

        .con .firstbox h3 {
            margin: 5px;
        }

        .con .box {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h2{
            color: rgb(255, 83, 83);
        }
       
    </style>
</head>

<body>
    <div class="navi">
        <ul>
            <li> <a href="sthome.php">Home</a> </li>
            <li><a href="#">About</a> </li>
            <li><a href="#">Services</a> </li>
            <li><a href="#">Contact us</a> </li>

        </ul>
    </div>

    <div class="con">
        <div class="firstbox">
            <form action="st_result.php" method="post">
                <br>
                <br>
                <h3>Enter roll Number:</h3>
                <input type="number" name="roll" id="roll">
                <br>
                <button name=btn id="btn">View Result</button>
            </form>
<?php
if(isset($_POST['btn'])) {
    $server="localhost";
    $username="root";
    $password="";
    $database="trip";

    $con=mysqli_connect($server, $username, $password, $database);

    if(!$con){
        echo "connection error";
    }
    else{
       
        $roll=$_POST['roll'];

        $sql = "SELECT * FROM `result` WHERE `roll` = $roll";
        $res = mysqli_query($con, $sql);
        $no_of_row = mysqli_num_rows($res);
        if( $no_of_row<=0)
        {
            echo "<h2>Oops! The roll number is not exist...</h2>";
        }
        else
        {

         while($row = mysqli_fetch_assoc($res))
         {
           ?>
            <div class="box">
            <form action="st_result.php" method="post" >
                <h4>Student roll number:</h4>
                <input type="number" name="roll" id="roll" value="<?php echo $row['roll'] ?>" >
                <br><br>
                <h4>English mark:</h4>
                <input type="number" name="eng" id="eng" value="<?php echo $row['eng'] ?>">
                <br><br>
                <h4>Math mark:</h4>
                <input type="number" name="math" id="math" value="<?php echo $row['math'] ?>">
                <br><br>
                <h4>Physics mark:</h4>
                <input type="number" name="phy" id="phy" value="<?php echo $row['phy'] ?>">
               
                
                
                

            </form>
            <br><br>
            <?php
                $total = $row['eng']+$row['math']+$row['phy'];
                $avg=$total/3;
                $resa = number_format((float)$avg, 2,'.','');
                echo "<h2>Your average number is  $resa </h2>";
                ?>
            </div>
        <?php
         }
        }
        
        }
        
    }
    ?>
    </div>
    </div>   

</body>

</html>