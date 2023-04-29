<?php
session_start();
if(isset($_SESSION["roled"])){
    
    if($_SESSION["roled"]=="INSTRUCTOR"){
        header('Location:../instructor/instructor.php');
    }else if ($_SESSION["roled"] =="STUDENT"){
        header('Location:../student/student.php');
    }else if ($_SESSION["roled"] =="ADMIN"){
        header('Location:../admin/admin.php');
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
        <title>cit</title>
        <link rel="stylesheet" href="../assets/css/topnav.css"/>

    </head>
    <body>
        <!-- heading -->
        <div class="heading"><img src="../assets/img/dbslogo.png" width=60 height=60 /></div>
        <div class="topnav">
            <div><a>|</a></div>
            <div><a></a></div>
            <div><a href="../actions/xxxlogout.php"></a></div>
        </div>




        <div>

            <!-- login form -->
            <div id="login-div">
            <form id="login-form" name="login-form" method="post" action="../actions/xxxauthentication.php">
            <?php
            if(isset($_SESSION["loginerror"])){
                ?><p style='color:red'  ><?php echo $_SESSION["loginerror"]; ?></p>
                <?php 
            }
         
            ?>
                <label for="username">username:</label>
                <input type="text" placeholder="enter username" name="username" id="username" required/>
                <br/>
                <label for="password">password:</label>
                <input type="password" placeholder="enter password" name="password" id="password" required/>
                <br/>
                <a href="#">forgot?</a>
                <input type="submit" name="submit" value="sign in"/>
    
            </form>
            </div>

        </div>
    </body>
</html>

