<?php 
if(isset($_POST['btn'])) {
    header("location: home.php"); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home</title>
    <style>
        *{
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
        .searchbox{
            color: white;
            padding-left: 1100px;
            padding-top: 15px;
        }
        .searchbox button{
            margin: 0px 0px 5px 60px;
            border: 5px solid black;
            border-radius: 2px;
        }
        .container{
            display: block;
            align-items: center;
            background-color: #fdcb6e;
            height: 550px;
            width: 100%;
        }
        .container .box{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        .container .box .std_sign_in{
            margin-top: 150px;
            padding: 10px;
            height: 200px;
            width: 200px;
            /* border: 2px solid rgb(67, 255, 42); */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container .box .std_sign_in img{
            height: 150px;
            width: 150px;
            border-radius: 15px;
        }
        .container .box .std_sign_in a{
            
            /* border: 2px solid black; */
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: black;
            height: 30px;
            width: 130px;
            background-color: #fab1a0;
        }
        .container .box .std_sign_in a:hover{
            background-color: #e17055;
        }
        .container .box .result{
            margin-top: 150px;
            padding: 10px;
            height: 200px;
            width: 200px;
            /* border: 2px solid rgb(67, 255, 42); */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container .box .result img{
            height: 150px;
            width: 150px;
            border-radius: 15px;
        }
        .container .box .result a{
            
            /* border: 2px solid black; */
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: black;
            height: 30px;
            width: 130px;
            background-color: #fab1a0;
        }
        .container .box .result a:hover{
            background-color: #e17055;
        }

        .container .box .notice{
            margin-top: 150px;
            padding: 10px;
            height: 200px;
            width: 200px;
            /* border: 2px solid rgb(67, 255, 42); */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container .box .notice img{
            height: 150px;
            width: 150px;
            border-radius: 15px;
        }
        .container .box .notice a{
            text-align: center;
            /* border: 2px solid black; */
            border-radius: 5px;
            text-decoration: none;
            color: black;
            height: 30px;
            width: 130px;
            background-color: #fab1a0;
        }
        .container .box .notice a:hover{
            background-color: #e17055;
        }

        .container .box .trip{
            margin-top: 150px;
            padding: 10px;
            height: 200px;
            width: 200px;
            /* border: 2px solid rgb(67, 255, 42); */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container .box .trip img{
            height: 150px;
            width: 150px;
            border-radius: 15px;
        }
        .container .box .trip a{
            text-align: center;
            /* border: 2px solid black; */
            border-radius: 5px;
            text-decoration: none;
            color: black;
            height: 30px;
            width: 130px;
            background-color: #fab1a0;
        }
        .container .box .trip a:hover{
            background-color: #e17055;
        }
        .btn{

                 font-weight: bold;
                 display: block;
                 float: right;
                  margin: 5px;
                   padding: 3px;
                   height: 40px;
                  width: 100px;
                  border-radius: 10px;
                  cursor: pointer;
            }
.btn:hover{
    background-color: #b2bec3;
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
    <div class="container">
        
        <div class="box">
            <div class="std_sign_in">
                <img src="std_sign-in.jpg" alt="result cant lode">
                <br>
                <a href="std_sign.php">Student Sign-in</a>
            </div>
            <div class="result">
                <img src="result.jpg" alt="result cant lode">
                <br>
                <a href="ad_result.php">Update result</a>
            </div>
            <div class="notice">
                <img src="notice.jpg" alt="notice cant lode">
                <br>
                <a href="crud.php">Upload notice </a>
            </div>
            <div class="trip">
                <img src="trip.jpg" alt=" Trip cant lode">
                <br>
                <a href="ad_trip.php"> View Trip details</a>
            </div>
        </div>
        <form action="adhome.php" method="post">
             <br>
                <button class="btn" name="btn">logout</button>
             <br>
        </form>
    </div>
</body>
</html>