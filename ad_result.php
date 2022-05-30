<?php
$flag=false;
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
        // echo "connected";
        $roll=$_POST['roll'];
        $eng=$_POST['eng'];
        $math=$_POST['math'];
        $phy=$_POST['phy'];

        $sql = "INSERT INTO `result` (`sno`, `roll`, `eng`, `math`, `phy`) VALUES (NULL, '$roll', '$eng', '$math', '$phy');";
        $res = mysqli_query($con, $sql);

        if(!$res){
            echo "not insert";
        }
        else{
            // echo "inserted";
            $flag=true;
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
    
    <title>Upload result</title>
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

        .searchbox {
            color: white;
            padding-left: 1100px;
            padding-top: 15px;
        }

        .searchbox button {
            margin: 0px 0px 5px 60px;
            border: 5px solid black;
            border-radius: 2px;
        }

        .con {
            background-color: bisque;
            height: 450px;
            width: 100%;
        }

       .con h2 {
           display: block;
           
            margin: 5px;
            padding: 4px;
        }
        .box form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .box form input{
            margin: 5px;
            padding: 3px;
        }
        .box form .btn{
            padding: 4px;
            height: 40px;
            width: 100px;
            background-color: rgb(250, 117, 117);
            color: rgb(0, 0, 0);
            border-radius: 7px;
            cursor: pointer;
        }
        .box form .btn:hover{
            background-color: tomato;
        }
        h3{
            display:block;
            background-color: rgb(205, 250, 194);
            border: 4px solid green;
            border-radius: 15px;
            color: black;
            height: 25px;
            width: 250px;
            text-align: center;

        }
       
    </style>
</head>

<body>
    <div class="navi">
        <ul>
            <li> <a href="adhome.php">Home</a> </li>
            <li><a href="#">About</a> </li>
            <li><a href="#">Services</a> </li>
            <li><a href="#">Contact us</a> </li>
            <div class="searchbox">
                <input type="text" name="search" id="search" placeholder="Search this webside">
                <button>search</button>
            </div>
        </ul>
    </div>
    <div class="con">
        <h2>Upload marks here:</h2>

      

        <br>
        <div class="box">
            <form action="ad_result.php" method="post">
            <?php
             if ($flag == true){
                     echo "<h3> Upload Successfully! </h3>";
                }
             ?>
             <br>
                <h4>Enter roll number</h4>
                 <input type="number" name="roll" id="roll">
                 <br>
                 <h4>Enter English Mark</h4>
                <input type="number" name="eng" id="eng">
                <br>
                <h4>Enter Math Mark</h4>
                <input type="number" name="math" id="math">
                <br>
                <h4>Enter Physics Mark</h4>
                <input type="number" name="phy" id="phy">
                <br>
                <br>
                <button class="btn" name="btn">Upload</button>
            </form>
        </div>

    </div>

</body>

</html>