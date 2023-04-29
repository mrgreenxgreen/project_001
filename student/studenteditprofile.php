<?php
    //start session
    session_start();
    //role cheeeck
    if(isset($_SESSION["roled"])){
        if($_SESSION["roled"]=="INSTRUCTOR"){
            header('Location:../student/student.php');
        }else if($_SESSION["roled"] != "STUDENT" && $_SESSION["roled"] != "INSTRUCTOR" ){
            header('Location:xxxlogin.php');
        }
    }else{
        header('Location:xxxlogin.php');
    }
    //header
    include_once('header.php');
    include_once('../actions/xxxdbconfig.php');
    $userID= $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $SQL_read = "SELECT * FROM students WHERE user_id = $user_id ";
    $result =mysqli_query($conn, $SQL_read);
    
    while($res_edit = mysqli_fetch_array($result)){
        global $fname ;
        // $fname = $res_edit['first_name']
        $screen_name = $res_edit['screen_name'];
        $fname = $res_edit['first_name'];
        $mname = $res_edit['middle_name'];
        $lname = $res_edit['last_name'];
        $address = $res_edit['address'];
        $college = $res_edit['college'];
        $course =$res_edit['course'];
        $section = $res_edit['section'];
        $gender = $res_edit['gender'];
        $height = $res_edit['height'];
        $weight = $res_edit['weight'];
        $contact_no = $res_edit['contact_no'];
        $blood_type = $res_edit['blood_type'];
        $about_me = $res_edit['about_me'];
     }

?>

    <!-- body content -->
    <div class="bodycontent">
        <div class="bodycontent-starter"></div>
        <h4> ID:<?php echo $_SESSION["school_id"]; ?> </h4>
                <form action="../actions/xxxchangescreenname.php" method="post">
                    <input type="text" name="screen_name" placeholder="screen name"  value="<?php echo $screen_name;?>"/>
                    <input type="submit" name="submit-screen-name" value="Changes" >
                </form>
        <h1>Personal Information </h1>
        <div class="box-main" >

            <!--box1 -->
            <div class="box1" >
                <!-- screen name -->
               
                
                <!-- Form/Input for Personal Information -->
                <form action="../actions/xxxinsertprofile.php" method="post" name="form-editprofile">
                    <h5>NAME:</h5>
                    <!-- name -->
                    <input type="text" placeholder="First Name" name="first_name"  value="<?php echo $fname;?>">
                    <input type="text" placeholder="Middle Name" name="middle_name" value="<?php echo $mname ;?>">
                    <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $lname ;?>" >
                    <h5>DATE OF BIRTH </h5>
                    <input type="date"  name="birthdate" disabled="disabled"/>
                    <!-- Address -->
                    <h5>ADDRESS: </h5>
                    <textarea id="address" name="address" rows="2" cols="50" style="border-radius:10px;padding:10px;" 
                    placeholder="(Municipality),(Province) e.g. Mobo, Masbate" ><?php echo $address; ?></textarea>
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
                    <!-- Course -->
                    <select style="margin:5px;padding:5px;" name="course">
                        <option value="BSIT" selected>BSIT</option>
                    </select>
                    <!-- Section -->
                    <select style="margin:5px;padding:5px;" name="section">
                        <option value="AT1A" >AT1A</option>
                        <option value="AT1B" selected>AT1B</option>
                        <option value="AT1C">AT1C</option>
                        <option value="AT1D">AT1D</option>
                        <option value="AT1E">AT1E</option>
                        <option value="AT1F">AT1F</option>
                        <option value="AT1C">FT1C</option>
                    </select>
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
                    <!-- Height -->
                    <label for="height">HEIGHT: </label>
                    <input type="text" name="height" id="height" placeholder="centimeters" value=<?php echo $height; ?> >
                    <label for="weight">WEIGHT: </label>
                    <input type="text" name="weight" id="height" placeholder="kilograms" value=<?php echo $weight; ?>>
                    <label for="weight">BLOODTYPE</label>
                    <input type="text" name="blood_type" id="height" placeholder="e.g. A, B, O, AB, etc." value=<?php echo $blood_type; ?> >
                    <label>CONTACT NO.: </label>
                    <input type="text" name="contact_no" placeholder="e.g. 09123456789"  value=<?php echo $contact_no; ?>>
                    
                    <br/>
                    <label>ABOUT ME: </label>
        
                    <textarea name="about_me" rows="2" cols="50" style="border-radius:10px;padding:10px;" placeholder="Personality/Likes/Dislikes" >
                    <?php  echo $about_me;?>
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
            <div class="box2">
                <p>ADD YOUTUBE MUSIC VIDEO URL</p>
                <form action="../actions/xxxaddmusic.php" method="post">
                <input type="text" name="youtubeURL" placeholder="Paste url here" />
                <input type="submit" name="submit-music" value="ADD" />
                </form>
                 PROFILE PICTURE:
                <br/>
                <img src="xxximage.php" alt=" (image preview here)" id="uploaded-image" width="150" height="150" style="border-radius:50%;">
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
<?php 
    
include_once('footer.php');
?>

