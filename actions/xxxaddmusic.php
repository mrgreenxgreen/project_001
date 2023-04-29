<?php 
session_start();
include_once('xxxdbconfig.php');

if(isset($_POST['submit-music'])){
$id = $_SESSION['user_id'];

$youtubeURL = $_POST['youtubeURL'];

$sql_music = "UPDATE students SET musicURL = '$youtubeURL'  WHERE user_id = '$id'";

$result_music = mysqli_query($conn, $sql_music);

if(!$result_music){
    die("Error: " . mysqli_error($conn));
}

echo "Hello";
header('Location:../student/studentprofile.php');





}

?>