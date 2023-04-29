<?php
//start session
session_start();

//check role (authorization)
if(isset($_SESSION["roled"])){
    if($_SESSION["roled"]=="INSTRUCTOR"){
        header('Location:../student/student.php');
    }else if($_SESSION["roled"] != "STUDENT" && $_SESSION["roled"] != "INSTRUCTOR" ){
        header('Location:../actions/xxxlogin.php');
    }

}else{
    header('Location:../actions/xxxlogin.php');
}
//database connection
include_once('../actions/xxxdbconfig.php');

//get data
$infoSQL = "SELECT * FROM students WHERE user_id = ".$_SESSION["user_id"];
$result_infoSQL = mysqli_query($conn, $infoSQL);
$name = "";
$course = "";
$section = "";
while($res_infoSQL = mysqli_fetch_array($result_infoSQL)){
    $name = $res_infoSQL['screen_name'];
    $first_name = $res_infoSQL['first_name'];
    $middle_name = $res_infoSQL['middle_name'];
    $last_name = $res_infoSQL['last_name'];
    $course = $res_infoSQL['course'];
    $section = $res_infoSQL['section'];
    $college = $res_infoSQL['college'];
    $gender = $res_infoSQL['gender'];
    $address = $res_infoSQL['address'];
    $contact = $res_infoSQL['contact_no'];
    $height = $res_infoSQL['height'];
    $weight = $res_infoSQL['weight'];
    $bloodtype = $res_infoSQL['blood_type'];
    $aboutme = $res_infoSQL['about_me'];
    $music_url = $res_infoSQL['musicURL'];
}

//header
include_once('header.php');

?>

<script>
window.onload = function() {
    var button = document.getElementById('playButton');
    button.click();
  };

</script>

        <!-- body content -->
        <div class="bodycontent">
        <div class="bodycontent-starter"></div>
            <div class="studentprofile">
            <!-- cover photo -->
            <div  >
                <!-- start -->
                <input type="text" id="youtube-url" placeholder="Paste YouTube link here" value="<?php  echo $music_url;?>" style="display:none;">
<button id="playButton" type="button" onclick="playVideo()" style="display:none;" >Play</button>
<div class="player-div">
<div id="player" ></div>
</div>
<script>
var player;
function playVideo() {
  var youtubeUrl = document.getElementById("youtube-url").value;
  var videoId = getYoutubeVideoId(youtubeUrl);
  
  if (videoId != "") {
    player = new YT.Player("player", {
    //   height: "250",
     
      width: "100%",
      videoId: videoId,
      events: {
        onReady: onPlayerReady,
      },
    });
  }
}

function onPlayerReady(event) {
  event.target.playVideo();
}

function getYoutubeVideoId(url) {
  var videoId = "";
  var match = url.match(/[?&]v=([^&]+)/);
  
  if (match) {
    videoId = match[1];
  } else {
    match = url.match(/youtu\.be\/([^\/]+)/);
    if (match) {
      videoId = match[1];
    }
  }
  
  return videoId;
}
</script>

<script src="https://www.youtube.com/iframe_api"></script>
                <!-- end -->
                 <!-- <button style="right:0;position:absolute;"> Add cover photo </button> -->
                 <!-- <div style="width:200px;height:75px;background-color:yellow;right:0;position:absolute;margin-top:20px;">meow</div> -->
            </div>
            <div class="studentprofilebox1" >
                    <!-- profile picture section -->
                    <div style="border-radius:50%;overflow:hidden; width:250px; height:250px;position:absolute;z-index:3;border:10px outset rgb(106, 250, 255);top:250px;">
                        <img src="../actions/xxximage.php" alt="Uploaded image" id="uploaded-image" width="250" height="250">
                    </div>
                    <br>
                    <!-- Basic Information Section -->
                    <!-- <h2>Personal Information: </h3> -->
                    <!-- dapat sani php generated name,course- section, address -->
                    <div style="margin-top:150px;">
                    <h4> &#10148; FIRST NAME: <?php echo $first_name; ?> </h4>
                    <h4> &#10148; MIDDLE NAME: <?PHP echo $middle_name; ?> </h4>
                    <h4> &#10148; LAST NAME: <?PHP echo $last_name; ?> </h4>
                        <p> &#9967	<?php echo $college; ?> </p>
                        <p> &#9892 <?php echo $gender;?> </p>
                        <p> &#9974 <?php echo $address; ?></p>
                        <p> &#9742	<?php echo $contact; ?> </p>
                        <table >
                        <br/>
                        <tr>
                            <th> <h4>Skill</h4></th>
                            <th> <h4>Rating</h4></th>
                        </tr>
                        <tr>
                            <td>   Cooking </td>
                            <td> - &#9733 &#9733 &#9733 &#9734 &#9734</td>
                        </tr>
                        <tr>
                            <td> Baking </td>
                            <td> - &#9733 &#9733 &#9733  &#9733 &#9734</td>
                        </tr>
                        <tr>
                            <td> Singing </td>
                            <td> - &#9733 &#9733 &#9734 &#9734 &#9734</td>
                        </tr>
                        <br/>
                        </table>
                <!-- start -->
            


                <!-- end -->
                    </div>  
            </div>
                <!-- Shout out and other infos -->
                <div class="studentprofilebox2">
                    <br/><br/><br/><br/><br/>
                        <div class="namebox" > 
                        <div x="namebox2"></div>
                    <h1 class="glow" style="color:#fff;"> <?php echo $name; ?> </h1> 
                        </div>
                        <br/>
                    <div id="coursebox" >
                        <h2 > <span style="color:lightblue;">&#9881 </span> <?php echo $course."-".$section; ?> </h2>
                        <hr  style ="border:3px dashed rgb(23, 191, 224);"/>
                    </div>
                    <br/>
                  
                    <h4> &#10148; DATE OF BIRTH: <?php echo "N/A"; ?></h4> 
                    <h4> &#10148; HEIGHT:<?php echo $height; ?></h4> 
                    <h4> &#10148; WEIGHT:<?php echo $weight; ?></h4> 
                    <h4> &#10148; BLOODTYPE:<?php echo $bloodtype;?></h4> 
                     <h4> &#10148;  ABOUT ME:   <?php echo $aboutme ?> </h4>
                    <br/>
                </div>
            </div>
            <div style="width:100%;text-align:center;">
            <hr  style ="border:2px dotted rgb(23, 191, 224);"/>
            <hr  style ="border:2px inset rgb(23, 191, 224);"/>
                    <h1 class="glow" style=""> MY POSTS</h1>
            <hr  style ="border:2px inset rgb(23, 191, 224);"/>


<?php 
    include_once('../actions/xxxdbconfig.php');
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM posts where posts.user_id = $id order by posts.timeanddate DESC" ;
    $result = mysqli_query($conn,$sql);
    while($res2 = mysqli_fetch_array($result)) {	
        // echo "<h5>".$res2['post_id']."</h5>";
        echo "<div style=\"border:1px solid skyblue;border-radius:15px;margin:5px;word-break: break-all\">";
        echo "<h5>".$res2['timeanddate']."</h5>";
    
                                            if ($res2['post_image'] === null || $res2['post_image'] === '') {
                                            }else{
                                            $post_img = $res2['post_image']; 
                                            $base64_img = base64_encode($post_img)  ;                          
                                            echo '<img src="data:image/jpeg;base64,' .$base64_img. '"  height=400 style="width:100%;"/>';
                                                }
                                            echo '<h1>'.$res2['post_title'].'</h1>';
                                        
        echo "<h4>".$res2['post_text']."</h4>";
        echo "</div>";
    }
?>
            </div>


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