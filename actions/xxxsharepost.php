<?php 
 session_start();
 include_once('xxxdbconfig.php');

// if(isset($_POST['share-post'])){

//     $userid = $_SESSION['user_id'];
//     $title = $_POST['post-title'];
//     $paragraph = $_POST['paragraph'];
//     $sql = '';
//     if ($_FILES["post-image"] != NULL || $_FILES["post-image"] != ''){
//         $image = addslashes(file_get_contents($_FILES["post-image"]["tmp_name"]));
//         $sql = "INSERT INTO posts(post_text,user_id,post_image,post_title) VALUES('$paragraph','$userid','$image','$title')";
//     }

//         $sql = "INSERT INTO posts(post_text,user_id,post_title) VALUES('$paragraph','$userid','$title')";
    
//     $result = mysqli_query($conn,$sql )
//     or die("Could not execute the insert query.");

//     header("Location:student.php");
//     //echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

    
// }


if(isset($_POST['share-post'])){

    $userid = $_SESSION['user_id'];
    $title = $_POST['post-title'];
    $paragraph = $_POST['paragraph'];
    $sql = "INSERT INTO posts(post_text,user_id,post_title) VALUES('$paragraph','$userid','$title')";

    if ($_FILES["post-image"]["tmp_name"] != "") {
        $image = addslashes(file_get_contents($_FILES["post-image"]["tmp_name"]));
        $sql = "INSERT INTO posts(post_text,user_id,post_image,post_title) VALUES('$paragraph','$userid','$image','$title')";
    }
    
    $result = mysqli_query($conn, $sql)
    or die("Could not execute the insert query.");

    header("Location:../student/student.php");
}



?>