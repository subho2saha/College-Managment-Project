<?php
if(isset($_POST['admin']))
{
    header("location: admin_login.php"); 
}

if(isset($_POST['stud']))
{
    header("location: std_login.php"); 
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
    <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
    <title>College HOME</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: 'Pushster', cursive;
        }

        body {
            background-color: rgb(182, 182, 182);
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

        .container {
            display: block;
            border: 2px solid black;
            border-radius: 5px;
            height: 660px;
            width: 1344px;
            background-size: 1343px 650px;
            background-color: #b2bec3;
            /* background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLlcw5VWVmFydi6bhLYOC3-zj6iZ6NJrB2PhYYrYaZaPEllgnARbYkFdqWH0XngQmEaK4&usqp=CAU ); */

        }

        .container h1 {
            margin: 18px;
            text-align: center;
            color: #2d3436;
        }

        .container p {
            text-align: center;
            color: #2d3436;
            padding: 0px 0px 50px 50px;
            font-size: 20px;
        }

        .container img {
            margin-left: 550px;
            border: 2px solid white;
            border-radius: 4px;
        }

        .container .box {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            align-items: center;
            height: 80px;
            width: 550px;
            margin-left: 420px;
            /* border: 2px solid red; */
            border-radius: 10px;
        }

        .container .box #admin {
            display: inline-block;
            height: 117px;
            width: 187px;
            border: 2px solid black;
            border-radius: 15px;
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8hw1mEFqdtexz9Er6T86Bjosexzqd7umGKgUlwscLhzFtRR3QgVUfJJcuAR6ISWxkTZs&usqp=CAU);
            cursor: pointer;
            background-size: 176px 111px;
        }

        .container .box #stud {
            display: inline-block;
            height: 117px;
            width: 187px;
            border: 2px solid black;
            border-radius: 15px;
            cursor: pointer;
            background-image: url(data:image/png;base64,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);
            background-size: 212px 115px;
        }

        .container .box #stud:hover {
            opacity: 0.8;
        }

        .container .box #admin:hover {
            opacity: 0.8;
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

    <div class="container">
        
        <h1>TECHNO  INTERNATIONAL  NEWTOWN</h1>
        <br>

        <img src="techno_logo.jpg" alt="">
        <br>
        <br><br>
        <br>
        <p>Techno International New Town (Formerly known as Techno India College of Technology), Approved by All India
            Council for Technical Education (AICTE) and Affiliated to Maulana Abul Kalam Azad University of Technology,
            West Bengal, India, is one of the best colleges of the Techno India Group.
            It started its journey in the year of 2005. The college is the logical development and the rational
            conclusion of the mission and the vision of the Techno India Group which is one of the largest knowledge
            management groups in India.
        </p>
        <br>
        <div class="box">
            <form action="home.php" method="post">

                <button id="admin" name="admin"></button>
                <button id="stud" name="stud"></button>

            </form>

        </div>

    </div>

</body>

</html>