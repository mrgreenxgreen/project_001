<?php
//start session
session_start();
$schoolID = "";
//check role (authorization)
if(isset($_SESSION["roled"])){

    if($_SESSION["roled"]=="INSTRUCTOR"){
        header('Location:student.php');
    }else if($_SESSION["roled"] != "STUDENT" && $_SESSION["roled"] != "INSTRUCTOR" ){
        header('Location:../actions/xxxlogin.php');
    }

}else{
    header('Location:../actions/xxxlogin.php');
}


include_once('header.php');
include_once('../actions/xxxdbconfig.php');
?>


        <!-- body content -->
        <div class="bodycontent">
        <div class="bodycontent-starter"></div>

            <!-- schedule -->
            <h1 style="color:yellow;"> My Schedule </h1>
                <div>
                    <table>
                        <tr>
                            <th>Subject</th>
                         
                            <th>Schedule </th>
                            <th>Instructor</th>
                        </tr>
                        

                    <?php 
                       
                        $schoolID = $_SESSION['school_id'];
                        
                        $SQL_schedule = "SELECT * FROM classes LEFT JOIN class_students ON classes.class_id =  class_students.class_id WHERE class_students.student_id = '$schoolID'";
                        $result_schedule = mysqli_query($conn, $SQL_schedule);
                        
                        while($res=mysqli_fetch_array($result_schedule)){
                            echo '<tr><td>'.$res['class_subject_code'].'<td/>';
                           
                            echo "".$res['class_schedule']."";
                            echo "<td>".$res['class_instructor']."<td/>";
                            echo "</tr>";
                          
                        }
                    ?>
                    </table>
                </div>
            <h1 style="color:yellow;"> Subjects </h1>
                <div>
                    (show subjects here)
                </div>
            
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