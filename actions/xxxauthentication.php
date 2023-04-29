<?php
session_start();

include_once('xxxdbconfig.php');

$result = mysqli_query($conn, "SELECT * FROM users");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['submit'])){
	// get form data
	$username = $_POST['username'];
	$password = $_POST['password'];

    while($row = mysqli_fetch_assoc($result)){

		$user_id = $row["user_id"];
        $myusername = $row["username"];
        $mypassword = $row["password"];
		$myrole = $row["role"];
		$name = $row["name"];

        // validate user credentials
	if ($username == $myusername && $password == $mypassword ) {

		// set session variables
		$_SESSION['loggedin'] = true;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['school_id'] = $myusername;
		$_SESSION['roled'] = $myrole;
		$_SESSION['name'] = $name;
		
		
		

		// redirect to view
		if($myrole == "STUDENT"){
			header('Location: ../student/student.php');
			exit;
		}else if($myrole == "INSTRUCTOR"){
			header('Location:../instructor/instructor.php');
			exit;
		}else if($myrole == "ADMIN"){
			header('Location:../admin/admin.php');
		}
		

	} else{
		// $error = "invalid username or password";
		$_SESSION['loginerror'] = "invalid username or password";
		header('Location:../actions/xxxlogin.php');
	}
	
	// $error = null;
	// if(!isset($_SESSION['loggedin'])){
	// 	$error ="invalid username or password";
    
    }
	
	}
}


?>