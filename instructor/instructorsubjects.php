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
        <h3 style="color:violet;">SCHEDULE</h3>
            <div class="subject_schedule">
          
                <table>
                    <tr><th>class ID</th>
                        <th>subject </th>
                        <th>schedule</th>
                    </tr>
                    <?php 
                        $id = $_SESSION['user_id'];
                        $sql_schedule = "SELECT * FROM classes WHERE user_id = '$id'";
                        $result_schedule = mysqli_query($conn, $sql_schedule);
                        while($res_schedule = mysqli_fetch_array($result_schedule)){
                                echo "<tr><td>".$res_schedule['class_id']."</td>";
                                echo "<td>".$res_schedule['class_subject_code']."</td>";
                                echo "<td>".$res_schedule['class_schedule']."</td></tr>";
                        }

                    ?>

                </table>
            </div>
            <!--PHP query once form submitted -->
           
            <?php
                $studentName ="";
                $studentID = "";

                  //CSV submission
            if(isset($_POST['submit_csv'])){
                // $class_id = $_POST['classID'];
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
                        $sql = "INSERT INTO class_students(class_id,student_id, student_name, section) VALUES ('$data[0]', '$data[1]', '$data[2]','$data[3]')";
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
                    <h3 style="color:violet;">ADD STUDENTS</h3>
                <p>Use 'Add Student' to manually add student</p>
                    <button disabled="disabled"> Add Student </button>
                    <!-- form upload -->
                <p>Use 'Upload CSV' to simultaneously add multiple students</p>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="classID" value="<?php $classID = 111; echo $classID;?>" >
                        <label for="file">Choose CSV file to upload:</label>
                        <input type="file" name="file" id="file">
                        <input type="submit" name="submit_csv" value="Upload CSV">
                    </form>
                    <h4> Sample Format </h4>
                    <img src="../assets/img/format_uplooad_students.jpg"   />
                    <!-- iterate handled subjects -->
                    
                    <h3 style="color:violet;">SHOW CLASS LIST</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <!-- <table > -->
                            <!-- inside each subject iterate section -->
                            <!-- <option value="111">CS101 BSIT-AT1A 7:00 AM - 11:00 AM Monday </option>
                            <option value="112">CS101 BSIT-AT1B 1:00 PM - 4:00 PM Monday </option>
                            <option>IT212 BSIT-AT1C 7:00 AM - 11:00 AM Wednesday  </option> -->
                            <!-- <tr><th>SUBJECT CODE </th>
                                <th>SCHEDULE</th>
                              -->
                                <!-- <th>Show</th>
                                <th>Add</th> -->
                            <!-- </tr> -->
                            <select name="class_id">
                            <?php 
                            $id = $_SESSION['user_id'];
                            $SQLclass = "SELECT class_id, class_subject_code, class_subject, class_schedule FROM classes WHERE user_id = '$id' ";

                            $result_class = mysqli_query($conn, $SQLclass);
                            while($res_class = mysqli_fetch_array($result_class)){
                                echo "<option value =\"".$res_class['class_id']."\">".$res_class['class_subject_code']. "   ".$res_class['class_schedule']." </option>";
                                // echo "<tr> <td>".$res_class['class_subject_code']."<td> ".$res_class['class_schedule'];
                                // echo "<td><a href=\"instructorsubjects.php?id=123\"> SHOW   </a> </td> <td><a href=\"instructorsubjects.php?id=123\">   ADD  </a> </td></tr>";
                             }

                            ?>
                            </select>
                        <!-- </table> -->
                      
                        <input type="submit" name="submit" value="Show List">
                        
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