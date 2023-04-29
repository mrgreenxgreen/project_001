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


include_once('../student/header.php');
?>



        <!-- body content -->
        <div class="bodycontent">
        <div class="bodycontent-starter"></div>

           
        </div>

        <!-- side navigation bar -->
<?php
    // include_once('footer.php');
    ?>

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