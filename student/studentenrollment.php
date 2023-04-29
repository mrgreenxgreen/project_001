<?php
//start session
session_start();

//check role (authorization)
if(isset($_SESSION["roled"])){

    if($_SESSION["roled"]=="INSTRUCTOR"){
        header('Location:student.php');
    }else if($_SESSION["roled"] != "STUDENT" && $_SESSION["roled"] != "INSTRUCTOR" ){
        header('Location:xxxlogin.php');
    }

}else{
    header('Location:xxxlogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- title -->
        <title>homepage</title>

        <!-- CSS import -->
        <link rel="stylesheet" href="./css/topnav.css"/>
        <link rel="stylesheet" href="./css/body.css"/>
        <link rel="stylesheet" href="./css/sidenav.css"/>


    </head>
    <body>
    <!-- heading -->
    <div class="heading"><img src="./css/dbslogo.png" width=60 height=60 aria-placeholder="logo"/></div>

        <!-- top navigation bar -->
        <div class="topnav">
            <div><a href="instructor.php">Home</a></div>
            <div>
                <a href="studentprofile.php">Profile</a>
                <a href="studentsubjects.php">Subjects</a>
                <a href="studentgrades.php">Grades</a>
            </div>
            <div><a  id="heaven" onclick="openSideNav()">&#9776</a></div>
        </div>

        <!-- body content -->
        <h1>student corner</h1>
        <div class="bodycontent">
          
        </div>

        <!-- side navigation bar -->
    
<div class="sidenav" id="sidenav">
                    <a style="color:white;" onclick="closeSideNav()">x</a>
                    <a href='<?php echo "studenteditprofile.php?id=".$_SESSION['user_id'];?>'>Edit Profile </a>
                    <a>side nav </a>
                    <a>side nav </a>
                    <a>side nav </a>
                    <a href="../actions/xxxlogout.php">log out</a>
                </div>
                <script src="sidenav.js"></script>
                
            </body>
    </html>";
