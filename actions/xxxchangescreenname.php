<?php 
session_start();
include_once('xxxdbconfig.php');

if(isset($_POST['submit-screen-name'])){
$id = $_SESSION['user_id'];

$screen_name = $_POST['screen_name'];

$sql_sname = "UPDATE students SET screen_name = '$screen_name'  WHERE user_id = '$id'";

$result_sname = mysqli_query($conn, $sql_sname);

if(!$result_sname){
    die("Error: " . mysqli_error($conn));
}

echo "Hello";
header('Location:../student/studentprofile.php');





}

?>