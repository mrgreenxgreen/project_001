<?php
    //session start
    session_start();
    //role check 
    if(isset($_SESSION["roled"])){
        if($_SESSION["roled"]=="INSTRUCTOR"){
            header('Location:../instructor/instructor.php');
        }else if($_SESSION["roled"] != "STUDENT" && $_SESSION["roled"] != "INSTRUCTOR" ){
            header('Location:../actions/xxxlogin.php');
        }
    }else{
        header('Location:../actions/xxxlogin.php');
    }
include_once('header.php');
?>
            <!-- BODY  -->
            <div class="bodycontent">
            <div class="bodycontent-starter"></div>
                <!-- news feed -->
                <div class="newsfeed" >
                    <h1 class="glow"> News Feed: </h1>
                <!-- POST FORM -->
                <form name="share-form" action="../actions/xxxsharepost.php" method="post" enctype="multipart/form-data">
                    <!-- image -->
                    <div>
                        <label for="post-image">Add Image</label>
                        <input type="file" id="post-image" name="post-image"  style="font-size:10px;width:200px;margin:0px;padding:0px;">
                    </div>
                    <!-- title -->
                    <input type="text" id="post-title" name="post-title" placeholder="Title:" >
                    <!-- paragraph -->
                    <textarea id="post-paragraph" name="paragraph" rows="10" cols="80" placeholder="Caption: " style="border-radius:15px;padding:10px;width:;"></textarea>
                    <!-- submit -->
                    <input id="post-submit" type="submit" value="Share" name="share-post" />
                </form>                
                <?php 
                        //database connection
                        include_once('../actions/xxxdbconfig.php');
                        $id = $_SESSION['user_id'];
                        // $sql = "SELECT * FROM posts LEFT JOIN students ON students.user_id = posts.user_id ORDER BY timeanddate DESC" ;
                        $sql = "SELECT post_id,post_image,post_title,post_text, timeanddate,posts.user_id AS user_id,
                        instructors.screen_name AS instructor_name, students.screen_name AS student_name, admin.screen_name AS admin_name
                        FROM posts 
                        LEFT JOIN students ON students.user_id = posts.user_id 
                        LEFT JOIN instructors ON instructors.user_id = posts.user_id 
                        LEFT JOIN admin ON admin.user_id = posts.user_id 
                        ORDER BY timeanddate DESC;";
                        $result = mysqli_query($conn,$sql);
                        while($res2 = mysqli_fetch_array($result)) {	
                            ?>
                            <div class="post" style="border:1px solid rgb(106, 250, 255);border-radius:15px;padding:10px;word-break:break-all;">
                                <div>
                                <div style="color:skyblue;">
                                <?php
                                   //echo $res2['timeanddate']."</p>  ";
                                   $date_str = $res2['timeanddate'];
                                   $datetime = new DateTime($date_str);
                                   $new_format = $datetime->format('F j, Y, g:i a');
                                   echo $new_format; // Output: April 4, 2023, 12:25 pm
                                   ?>
                           </div> 
                                    <div class="post-header">
                                            <div class="post-head">
                                                <div class="post-avatar-div">
                                                    <!-- <img src="./css/dbslogo.png" placeholder="AAA" width="30" height="30"/> -->
                                                    <?php
                                                        $avatar_id = $res2['user_id'];
                                                        $sql_avatar = "SELECT picture FROM pictures WHERE user_id = '$avatar_id' AND activate=1 ";
                                                        $result_avatar = mysqli_query($conn, $sql_avatar);
                                                        
                                                        while($res_avatar = mysqli_fetch_array($result_avatar)){
                                                            if ($res_avatar['picture'] === null || $res_avatar['picture'] === '') {
                                                                echo "<img +src='\"./css/dbslogo.png\"'placeholder='\"AAA\"' width='\"30\"' height='\"30\"'/>";
                                                            }else{   
                                                            $avatar_raw = $res_avatar['picture']; 
                                                            $avatar = base64_encode($avatar_raw)  ;                          
                                                            echo '<img src="data:image/jpeg;base64,' .$avatar. '" width=50 height=50  />';
                                                            }
                                                        }
                                                    ?>
                                                </div><b>
                                                    <div style="color:#66ffff;">
                                                <?php  
                                                    if ($res2['student_name'] == NULL && $res2['admin_name'] == NULL){
                                                        echo "<p style=\"margin:15px;\">".$res2['instructor_name']." "; //.$res2['last_name']
                                                    }else if ($res2['instructor_name'] == NULL && $res2['admin_name'] == NULL){
                                                        echo "<p style=\"
                                                        margin:15px;\">".$res2['student_name']." "; //.$res2['last_name']
                                                    }else if ($res2['instructor_name'] == NULL && $res2['student_name'] == NULL){
                                                        echo "<p style=\"
                                                        margin:15px;\">".$res2['admin_name']." "; //.$res2['last_name']
                                                    }
                                                   ?>
                                                    </b>
                                                    </div>
                                            </div>      
                                    </div>
                                </div>
                                    <!-- image post -->
                                    <div style="display:flex; justify-content: center;flex-direction:column;align-items:center;word-break:break-all;">
                                        <?php
                                            if ($res2['post_image'] === null || $res2['post_image'] === '') {
                                            }else{
                                            $post_img = $res2['post_image']; 
                                            $base64_img = base64_encode($post_img)  ;                          
                                            echo '<img src="data:image/jpeg;base64,' .$base64_img. '" width=400 height=400/>';
                                                }
                                            echo '<h1>'.$res2['post_title'].'</h1>';
                                        ?>  
                                    </div>       
                                        <?php
                                            echo "<p>".$res2['post_text']."</p> ";
                                        ?>
                            </div>
                            <?php
                        }
                    ?> 
                </div>
                <div class="sidenav" id="sidenav">
                    <a style="color:white;" onclick="closeSideNav()">x</a>
                    <a href='<?php echo "studenteditprofile.php?id=".$_SESSION['user_id'];?>'>&#9998 Edit Profile </a>
               
                    <a>side nav </a>
                    <a>side nav </a>
                    <a> &#9965 Security</a>
                    <a href="../actions/xxxlogout.php">log out</a>
                </div>
                <script src="sidenav.js"></script>
                
            </body>
    </html>";     
           
