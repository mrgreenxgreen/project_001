<?php
session_start();

if(isset($_SESSION["roled"])){

    if($_SESSION["roled"]=="STUDENT"){
        header('Location:student.php');
    }
    else if($_SESSION["roled"] == "INSTRUCTOR" ){
        header('Location:instructor.php');
    }

}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>homepage</title>

        <link rel="stylesheet" href="./css/topnav.css"/>
        <link rel="stylesheet" href="./css/body.css"/>

    </head>
    <body>
    <div class="heading"><img src="./css/dbslogo.png" width=60 height=60 aria-placeholder="logo"/></div>

        <div class="topnav">
            <div><a>Home</a></div>
            <div><a>Subjects</a><a>Grades</a><a>Enrollment</a></div>
            <div><a href="logout.php">Logout</a></div>
        </div>
        <h1>Admin Corner</h1>
    </body>
</html>
