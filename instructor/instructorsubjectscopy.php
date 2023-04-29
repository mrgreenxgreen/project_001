<?php
//start session
session_start();

//check role (authorization)
if(isset($_SESSION["roled"])){

    if($_SESSION["roled"]=="STUDENT"){
        header('Location:../student/student.php');
    }else if($_SESSION["roled"] != "INSTRUCTOR" && $_SESSION["roled"] != "STUDENT" ){
        header('Location:xxxlogin.php');
    }

}else{
    header('Location:../actions/xxxlogin.php');
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
        <link rel="stylesheet" href="../assets/css/topnav.css"/>
        <link rel="stylesheet" href="../assets/css/body.css"/>
        <link rel="stylesheet" href="../assets/css/sidenav.css"/>
        <link rel="stylesheet" href="../assets/css/instructorsubjects.css"/>


    </head>
    <body>
    <!-- heading -->
    <div class="heading"><img src="../assets/img/dbslogo.png" width=60 height=60 aria-placeholder="logo"/></div>

        <!-- top navigation bar -->
        <div class="topnav">
            <div><a href="instructor.php">Home</a></div>
            <div>
                <a href="instructorprofile.php">Profile</a>
                <a href="instructorsubjects.php">Subjects</a>
                <a href="instructorgrades.php">Grades</a>
            </div>
            <div><a  id="heaven" onclick="openSideNav()">&#9776</a></div>
        </div>

        <!-- body content -->
        <div class="bodycontent">
            <!--PHP query once form submitted -->
            <?php
                include_once('../actions/xxxdbconfig.php');
                $studentName ="";
                $studentID = "";

                  //CSV submission
            if(isset($_POST['submit_csv'])){
                $class_id = $_POST['classID'];
            // check if the file is a CSV file
                $filetype = $_FILES["file"]["type"];
                if($filetype !== "text/csv"){
                    die("Only CSV files are allowed.");
                }

                // open the file and read the data
                $filename = $_FILES["file"]["tmp_name"];
                if($_FILES["file"]["size"] > 0){
                    $file = fopen($filename, "r");
                    while (($data = fgetcsv($file, 10000, ",")) !== FALSE){

                        // insert the data into MySQL database
                        $sql = "INSERT INTO class_students (class_id,student_id, student_name, section) VALUES ('$class_id','$data[0]', '$data[1]', '$data[2]')";
                        $result = mysqli_query($conn, $sql);
                        if(!$result){
                            die("Error: " . mysqli_error($conn));
                        }
                    }
                    fclose($file);
                    echo "File uploaded successfully.";
                }
        }

        

          
            // mysqli_close($conn);
            
                ?>
            <div style="width:100vw; background-color: ;text-align:center;display:flex;flex-direction:column;jusify-content:center;align-items:center;">
                <div>
                    <!-- iterate handled subjects -->
                    
                    <h1> Classes </h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <select name="class_id">
                            <!-- inside each subject iterate section -->
                            <option value="111">CS101 BSIT-AT1A 7:00 AM - 11:00 AM Monday </option>
                            <option value="112">CS101 BSIT-AT1B 1:00 PM - 4:00 PM Monday </option>
                            <option>IT212 BSIT-AT1C 7:00 AM - 11:00 AM Wednesday  </option>
                            <input type="submit" name="submit" value="Select">

                        </select>
                    </form>
                    <p>Use 'Add Student' to manually add student</p>
                    <button> Add Student </button>
                    <!-- form upload -->
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="classID" value="<?php $classID = 111; echo $classID;?>" >
                        <label for="file">Choose CSV file to upload:</label>
                        <input type="file" name="file" id="file">
                        <input type="submit" name="submit_csv" value="Upload">
                    </form>
                    <!-- <p>Use 'Upload CSV' to add multiple students <br/>thru csv/excel file</p> -->
                    <!-- <button> Upload CSV </button> -->
                    <table>
                        <tr>
                            <th>No. </th>
                            <th>ID </th>
                            <th>Name </th>
                            <th>Option</th>
                          
                        </tr>

                <?php   
                $no = 1;
                //data table  
                if(isset($_POST['submit'])) {
                    $classID = $_POST['class_id'];
                    $SQL_read_students = "SELECT * FROM class_students WHERE class_id = '$classID'" ;
                    // Do something with the form data, like send an email
                    // echo "Thank you for your message, $name!";
                    $result = mysqli_query($conn, $SQL_read_students);
                    while($res2 = mysqli_fetch_array($result)) {	
                        $studentID = $res2['student_id'];
                        $studentName = $res2['student_name'];

                
            ?>
                   
                        <tr>
                           <?php  ; echo "<td> ".$no."</td>
                            <td>".$studentID."</td>
                            <td>".$studentName."</td>
                            <td> <a href=\"#\" > &#9998; </a>| <a href=\"#\"> &#x1F5D1 </a></td>";
                            $no += 1;
                    }}
                            ?>
                        </tr>
                    </table>
                </div>
                
            </div>
           
        </div>

        <!-- side navigation bar -->
        <div class="sidenav" id="sidenav">
            <a style="color:white;" onclick="closeSideNav()">x</a>
            <a href="instructoreditprofile.php">Edit Profile </a>
            <a>side nav </a>
            <a>side nav </a>
            <a>side nav </a>
            <a href="xxxlogout.php">log out</a>
        </div>
        <script src="sidenav.js"></script>

        
    </body>
</html>
