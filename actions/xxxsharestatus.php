<?php 
session_start();
include_once('xxxdbconfig.php');

if(isset($_POST['share-status'])){

    $userid = $_SESSION['user_id'];
    $a = $_POST['paragraph'];
    $sql = "INSERT INTO posts(post_text,user_id) VALUES('$a','$userid')";
    $result = mysqli_query($conn,$sql )
    or die("Could not execute the insert query.");

    header("Location:studentprofile.php");
    //echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    
    
}


?>