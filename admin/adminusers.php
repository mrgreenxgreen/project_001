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
        <link rel="stylesheet" href="../assets/css/adminusers.css"/>


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
            <?php
                if(isset($_POST['submit_user_manual'])){
                    $screen_name = $_POST['screen_name'];
                    $username = $_POST['user_name'];
                    $password = $_POST['user_password'];
                    $role = $_POST['role'];

                    $sql_user = "INSERT INTO users(name,username,password,role) VALUES('$screen_name', '$username', '$password', '$role')";
                    $result_user = mysqli_query($conn, $sql_user);
                    if(!$result_user){
                        die("Error: " . mysqli_error($conn));
                    }
                    $sql_new_user = "SELECT users.user_id AS uid,users.role FROM users WHERE users.user_id NOT IN (SELECT students.user_id FROM students)
                    AND users.user_id NOT IN (SELECT instructors.user_id FROM instructors)
                    AND users.user_id NOT IN (SELECT admin.user_id FROM admin)
                    ";
                    $result_new_user = mysqli_query($conn, $sql_new_user);
                    while ($res_new_user=mysqli_fetch_array($result_new_user)){
                        $new_user_id = $res_new_user['uid'];
                        $new_user_role = $res_new_user['role'];
                        if($new_user_role == "STUDENT"){
                            $sql_insert_new_user_id = "INSERT INTO students(user_id) VALUES($new_user_id)";
                            $inserted = mysqli_query($conn, $sql_insert_new_user_id);
                        }else if($new_user_role == "INSTRUCTOR"){
                            $sql_insert_new_user_id = "INSERT INTO instructors(user_id) VALUES($new_user_id)";
                            $inserted = mysqli_query($conn, $sql_insert_new_user_id);

                        }else if($new_user_role == "ADMIN"){
                            $sql_insert_new_user_id = "INSERT INTO admin(user_id) VALUES($new_user_id)";
                            $inserted = mysqli_query($conn, $sql_insert_new_user_id);

                        }
                    }

                }

                //add users thru CSV file
                if(isset($_POST['submit_user_csv'])){
                    // check if the file is a CSV file
                        $filetype = $_FILES["file"]["type"];
                        if($filetype !== "text/csv"){
                            die("Only CSV files are allowed.");
                        }

                        // open the file and read the data
                        $filename = $_FILES["file"]["tmp_name"];
                        if($_FILES["file"]["size"] > 0){
                            $file = fopen($filename, "r");

                            fgetcsv($file);


                            while (($data = fgetcsv($file, 10000, ",")) !== FALSE){

                                // insert the data into MySQL database
                                $sql_users = "INSERT INTO users(name,username, password, role) VALUES ('$data[0]', '$data[1]', '$data[2]','$data[3]')";
                                // $sql_student = "INSERT INTO students(user_id) VALUES ($user_id)";
                                $result = mysqli_query($conn, $sql_users);
                                if(!$result){
                                    die("Error: " . mysqli_error($conn));
                                }

                            }
                            // fclose($file);
                            echo "File uploaded successfully.";
                            $sql_new_user = "SELECT users.user_id AS uid,users.role FROM users WHERE users.user_id NOT IN (SELECT students.user_id FROM students)
                            AND users.user_id NOT IN (SELECT instructors.user_id FROM instructors)
                            AND users.user_id NOT IN (SELECT admin.user_id FROM admin)";
                            $result_new_user = mysqli_query($conn, $sql_new_user);
                            while ($res_new_user=mysqli_fetch_array($result_new_user)){
                                $new_user_id = $res_new_user['uid'];
                                $new_user_role = $res_new_user['role'];
                                if($new_user_role == "STUDENT"){
                                    $sql_insert_new_user_id = "INSERT INTO students(user_id) VALUES($new_user_id)";
                                    $inserted = mysqli_query($conn, $sql_insert_new_user_id);
                                }else if($new_user_role == "INSTRUCTOR"){
                                    $sql_insert_new_user_id = "INSERT INTO instructors(user_id) VALUES($new_user_id)";
                                    $inserted = mysqli_query($conn, $sql_insert_new_user_id);

                                }else if($new_user_role == "ADMIN"){
                                    $sql_insert_new_user_id = "INSERT INTO admin(user_id) VALUES($new_user_id)";
                                    $inserted = mysqli_query($conn, $sql_insert_new_user_id);

                                }
                            }

                            
                        }
                }
            ?>
            <div class="newuser">
                <div class="newuserinnerbox">
                    <h1> Add new user</h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="text" name="screen_name" placeholder="screen name">
                        <input type="text" name="user_name" placeholder="username">
                        <input type="text" name="user_password" placeholder="password">
                        <select name="role">
                            <option value="INSTRUCTOR">Instructor</option>
                            <option value="STUDENT" selected>Student</option>
                        </select>
                        <input type="submit" name="submit_user_manual" value="Add User" id="newuser_button">
                    </form>
                </div>
            </div>

            <p> Add multiple users simultaneously thru csv file </p>
            <form method="post" enctype="multipart/form-data">
                    <label for="file">Choose CSV file to upload:</label>
                    <input type="file" name="file" id="file">
                    <input type="submit" name="submit_user_csv" value="Upload CSV">
            </form>
           
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
