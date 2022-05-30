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

        .con {
            background-color: bisque;
            height: 565px;
            width: 100%;
        }

        .con h2 {
            display: block;

            margin: 5px;
            padding: 4px;
        }

        .box form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .box form input {
            margin: 5px;
            padding: 3px;
        }

        .box form .btn {
            padding: 4px;
            height: 40px;
            width: 100px;
            background-color: rgb(250, 117, 117);
            color: rgb(0, 0, 0);
            border-radius: 7px;
            cursor: pointer;
        }

        .box form .btn:hover {
            background-color: tomato;
        }

        h3 {
            display: block;
            background-color: rgb(205, 250, 194);
            border: 4px solid rgb(102, 110, 107);
            border-radius: 10px;
            color: black;
            height: 25px;
            width: 250px;
            text-align: center;

        }

        .conn {
            background-color: bisque;
            /* border: 2px solid green; */
            height: 565px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .conn .firstbox {

            /* position: fixed; */
            display: flex;
            height: 280px;
            /* border: 2px solid red; */
            width: 420px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 50px;
        }

        .conn .firstbox #btnn {
            height: 35px;
            width: 80px;
            background-color: rgb(250, 117, 117);
            border-radius: 5px;
            margin: 15px;
            cursor: pointer;

        }

        .conn .firstbox #btnn:hover {
            opacity: 0.8;
            background-color: tomato;
        }

        .conn .firstbox input {
            height: 20px;
        }

        .conn .firstbox h3 {
            margin: 5px;
        }

        .conn .secbox {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .super {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="navi">
        <ul>
            <li> <a href="#">Home</a> </li>
            <li><a href="#">About</a> </li>
            <li><a href="#">Services</a> </li>
            <li><a href="#">Contact us</a> </li>

        </ul>
    </div>
    <div class="super">
        <div class="con">
            <h2>Upload marks here:</h2>
            <br>
            <div class="box">
                <form action="q4.php" method="post">
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

        <div class="conn">
            
            <div class="firstbox">
                <form action="q4.php" method="post">
                    <h2>View marks here:</h2>
                    <br>
                    <br>
                    <h3>Enter roll Number:</h3>
                    <input type="number" name="rolll" id="rolll">
                    <br>
                    <button name=btnn id="btnn">View Result</button>
                </form>
                <?php
if(isset($_POST['btnn'])) {
    $server="localhost";
    $username="root";
    $password="";
    $database="trip";

    $con=mysqli_connect($server, $username, $password, $database);

    if(!$con){
        echo "connection error";
    }
    else{
       
        $rolll=$_POST['rolll'];

        $sql = "SELECT * FROM `result` WHERE `roll` = $rolll";
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
                <div class="secbox">
                    <form action="q4.php" method="post">
                        <h4>Student roll number:</h4>
                        <input type="number" name="roll" id="rolll" value="<?php echo $row['roll'] ?>">
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

    </div>    
</body>

</html>



<!--
Attributes in 'result' table under 'trip' database :


 #	Name	Type	Collation	Attributes	Null	Default 	Comments	Extra	         Action
1   sno primary  int(3)		                     No	     None		           AUTO_INCREMENT	Change Drop More
2	roll	int(3)		                   	 No	     None			                        Change Drop	More
3	eng	    int(3)			                 No	     None			                        Change Drop	More
4	math	int(3)			                 No    	 None			                        Change Drop	More
5	phy	    int(3)			                 No	     None			                        Change Drop	More -->
