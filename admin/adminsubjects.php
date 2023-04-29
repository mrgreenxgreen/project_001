<?php
//start session
session_start();

//check role (authorization)
if(isset($_SESSION["roled"])){

    if($_SESSION["roled"]=="STUDENT"){
        header('Location:../student/student.php');
    }else if($_SESSION["roled"] == "INSTRUCTOR" ){
        header('Location:../instructor/instructor.php');
    }else if($_SESSION["roled"] != "ADMIN" ){
        header('Location:../actions/xxxlogin.php');
    }

}else{
    header('Location:../actions/xxxlogin.php');
}


include_once('../actions/xxxdbconfig.php');
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
        <link rel="stylesheet" href="../assets/css/topnav.css"/>
        <link rel="stylesheet" href="../assets/css/body.css"/>
        <link rel="stylesheet" href="../assets/css/sidenav.css"/>
        <link rel="stylesheet" href="../assets/css/adminsubject.css"/>



    </head>
    <body>
    <!-- heading -->
    <div class="heading"><img src="../assets/img/dbslogo.png" width=60 height=60 aria-placeholder="logo"/></div>

        <!-- top navigation bar -->
        <div class="topnav">
        <div><a href="admin.php">Home</a></div>
            <div>
            <a href="adminprofile.php">Profile</a>
                <a href="adminsubjects.php">Subjects</a>
                <a href="adminusers.php">Users</a>
            </div>
            <div><a  id="heaven" onclick="openSideNav()">&#9776</a></div>
        </div>

        <!-- body content -->
        <div class="bodycontent">
            <div class="addsubject">
                <div class="addsubjectinnerbox">
                <h1> Add new subject </h1>
                <?php 
                if(isset($_POST['submit-subject'])){
                    $subject_code = $_POST['subject_code'];
                    $subject_name = $_POST['subject_name'];
                    $instructor_user_id = $_POST['subject_instructor'];
                    $subject_schedule = $_POST['subject_schedule'];
                    $subject_description = $_POST['subject_description'];
                    $sql_subject = "INSERT INTO classes(class_subject_code,class_subject,user_id,class_schedule,class_description) 
                    VALUES('$subject_code','$subject_name','$instructor_user_id','$subject_schedule','$subject_description')";
                    $result_subject = mysqli_query($conn,$sql_subject);
                    if(!$result_subject){
                        die("Error: " . mysqli_error($conn));
                    }
                    echo "Inserted successfully!";
                    
                }
                
                ?>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <input type="text" name="subject_code" placeholder="subject code"/>
                    <input type="text" name="subject_name" placeholder="subject name"/>
                    <!-- <input type="text" name="subject_instructor" placeholder="instructor's name"/> -->
                    <label>Choose Instructor</label>
                    
                        
                    <select name="subject_instructor">
                        <?php
                        
                        $sql_instructor = "SELECT name,user_id FROM users WHERE role='INSTRUCTOR'";
                        $result_instructor = mysqli_query($conn, $sql_instructor);
                        while( $res_instructor = mysqli_fetch_array($result_instructor)){
                        echo "<option value=\"".$res_instructor['user_id']."\" >".$res_instructor['name']."</option>";
                        }
                        ?>
                    </select>
                    <input type="text" name="subject_schedule" placeholder="class schedule"/>

                    <textarea name="subject_description" rows="5" cols="10" placeholder="write description here."></textarea>
                    <input type="submit" name="submit-subject" value="Add Subject" />
                </form>

                </div>
            </div>

            <!-- table of subjects -->
            <div>
                <h1>Subject Data Table</h1>
                <table>
                    <tr><th> code </th>
                        <th>name </th>
                        <th>instructor </th>
                        <th>schedule </th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>

                </table>
            </div>


        </div>

        <!-- side navigation bar -->
        <div class="sidenav" id="sidenav">
                    <a style="color:white;" onclick="closeSideNav()">x</a>
                    <a href='<?php echo "admineditprofile.php?id=".$_SESSION['user_id'];?>'>Edit Profile </a>
                    <a>side nav </a>
                    <a>side nav </a>
                    <a>side nav </a>
                    <a href="../actions/xxxlogout.php">log out</a>
                </div>
                <script src="sidenav.js"></script>
                
            </body>
    </html>   
