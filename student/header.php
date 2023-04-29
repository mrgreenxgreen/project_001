

<?php

echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <!-- meta tags -->
        <meta charset=\"UTF-8\">
        <meta name=\"description\" content=\"Free Web tutorials\">
        <meta name=\"keywords\" content=\"HTML, CSS, JavaScript\">
        <meta name=\"author\" content=\"John Doe\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        
        <!-- title -->
        <title>homepage</title>

        <!-- CSS import -->
        <link rel=\"stylesheet\" href=\"../assets/css/topnav.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/body.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/sidenav.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/profile.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/post.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/editprofile.css\"/>
        <link rel=\"stylesheet\" href=\"../assets/css/studentsubjects.css\"/>
        <link rel=\"stylesheet\"
        href=\"https://fonts.googleapis.com/css?family=Goldman\">



    </head>
    <body>
    <!-- heading -->
    <div class=\"maintopnav\">
    <div class=\"heading\"><img src=\"../assets/img/dbslogo.png\" width=60 height=60 aria-placeholder=\"logo\"/></div>

        <!-- top navigation bar -->
        <div class=\"topnav\">
            <div><a href=\"student.php\">Home</a></div>
            <div>
                <a href=\"studentprofile.php\">Profile</a>
                <a href=\"studentsubjects.php\">Subjects</a>
                <a href=\"studentgrades.php\">Grades</a>
            </div>
            <div><a  id=\"heaven\" onclick=\"openSideNav()\">&#9776</a></div>
        </div>
    </div>    ";   

        ?>