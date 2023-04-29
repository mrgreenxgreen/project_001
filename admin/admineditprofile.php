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
        <link rel="stylesheet" href="../assets/css/editprofile.css"/>
    </head>
    <body>
    <!-- heading -->
    <div class="heading"><img src="../assets/img/dbslogo.png" width=60 height=60 aria-placeholder="logo"/></div>

        <!-- top navigation bar -->
        <div class="topnav">
            <div><a href="instructor.php">Home</a></div>
            <div>
                <a href="instructorsubjects.php">Subjects</a>
                <a href="instructorgrades.php">Grades</a>
                <a href="instructorenrollment.php">Manage</a>
            </div>
            <div><a  id="heaven" onclick="openSideNav()">&#9776</a></div>
        </div>

        <!-- body content -->
        <div class="bodycontent">
           
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


<!-- edit profile here -->
    <!-- body content -->
    <div class="bodycontent" style="border:4px solid skyblue;">
        <h4> ID:<?php echo $_SESSION["school_id"]; ?> </h4>
        <h1>Personal Information </h1>
        <div class="box-main" style="border:2px dashed skyblue;text-align:center;">

            <!--box1 -->
            <div class="box1" style="">
                
                <!-- Form/Input for Personal Information -->
                <form action="../actions/xxxinsertprofileinstructor.php" method="post" name="form-editprofile">
                    <h5>NAME:</h5>
                    <!-- name -->
                    <input type="text" placeholder="First Name" name="first_name"  value="<?php 
                     
                    //echo $fname;
                    
                    ?>">
                    <input type="text" placeholder="Middle Name" name="middle_name" value="<?php //echo $mname ;?>">
                    <input type="text" placeholder="Last Name" name="last_name" value="" >
                    <h5>DATE OF BIRTH </h5>
                    <input type="date"  name="birthdate" disabled="disabled"/>
                    <!-- Address -->
                    <h5>ADDRESS: </h5>
                    
                    <br/>
                    <!-- College -->
                    <label> COLLEGE:</label>
                    <br/>
                    <select style="margin:5px;padding:5px;" id="college" name="college">
                        <option value="College of Industrial Technology" selected>College of Industrial Technology</option>
                    </select>
                    <br/>
                    <label>COURSE & SECTION: </label>
                    <br/>
                
                    <br/>                <br/>
                    <!-- Gender -->
                    <label > GENDER: </label>
                    <div style="display:flex;flex-direction:row;">
                    <br/>
                    <p>Male:</p><input type="radio" value ="male" name="gender" checked onclick="checkBtn(this)"/>
                    <p>Female:</p> <input type="radio" value ="female" name="gender" onclick="checkBtn(this)"/>
                    </div>
                    <script>
                        function checkBtn(radio){
                            var checkboxes = document.getElementsByName('gender')
                        checkboxes.forEach((item) => {
                        if (item !== radio) item.checked = false
                        })
                        }
                    </script>
                    <br/>
                  
                    <br/>
                    <label>ABOUT ME: </label>
        
                    <textarea name="about_me" rows="2" cols="50" style="border-radius:10px;padding:10px;" placeholder="Personality/Likes/Dislikes" >
                    <?php  //echo $about_me;?>
                    </textarea>
                    <br/>
                    <!-- hidden input: ID -->
                    <input type="hidden" name="userID" value="<?php echo $userID;?>"/>
                    <!-- submit button -->
                    <input type="submit" value="Save" name="saveprofile" style="background-color:skyblue;color:white;font-size:20px;font-weight:bold;height:40px;width:100px;border-radius:25px;"/>
                    <!--close-->
                    </form>
            </div>

            <!-- Box 2-->
            <div class="box2" style="border:2px solid skyblue;">
                 Profile Picture
                <br/>
                <img src="xxximage.php" alt="Uploaded image" id="uploaded-image" width="150" height="150" style="border-radius:50%;">
                <!-- <form>  -->
                <form method="post" action="../actions/xxxinsert.php" enctype="multipart/form-data">
                    <br/>
                    <label for="image-upload">Select an image to upload:</label>
                    <br/>
                    <!-- <input type="file" id="image-upload" name="image"> -->
                    <input type="file" name="image" id="image-upload" style="font-size:10px;"><br><br>
                    <br/>
                    <input type="submit" value="Upload" name="submit" style="height:40px;width:100px;font-size:20px;font-weight:bold;color:white;background-color:skyblue;border-radius:15px;">
                </form>
                <script>
                    //javascript for changing profile picture
                    const imageUpload = document.querySelector('#image-upload');
                    const uploadedImage = document.querySelector('#uploaded-image');
                    imageUpload.addEventListener('change', () => {
                        const file = imageUpload.files[0];
                        const reader = new FileReader();

                        reader.addEventListener('load', () => {
                        uploadedImage.src = reader.result;
                        });

                        reader.readAsDataURL(file);
                    });
                </script>
                <!-- skills -->
                <div>
                    <h4> SKILLS </h4>
                    <form>
                        <input type="text" disabled="disabled"> -
                        <input type="range" id="vol" name="vol" min="0" max="50" disabled="disabled">
                        <input type="submit" value="Add" style="padding:5px;margin:5px;border-radius:10px;width:40px;" disabled="disabled"/>
                    </form>
                    <table>
                        <tr>
                            <th>Skill</th>
                            <th>Rating</th>
                        </tr>
                        <tr>
                            <td>Cooking </td>
                            <td>- &#9733 &#9733 &#9733 &#9734 &#9734</td>
                        </tr>
                    
                    </table>
                </div>
            </div>

        </div>
        </form>
        <button><a href="studentprofile.php">Close</a></button>
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


