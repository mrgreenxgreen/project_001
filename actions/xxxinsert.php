<?php
session_start();

include_once('xxxdbconfig.php');

$id = $_SESSION['user_id'];
	
	// Check if form submitted
	if(isset($_POST["submit"])) {
		// Get image data
		$image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

		$deactivateDPSQL = "UPDATE pictures SET activate = 0 where user_id = '$id'";
		$result_deactivateDPSQL = mysqli_query($conn, $deactivateDPSQL);

		// Insert image data into MySQL database
		$sql = "INSERT INTO pictures(picture,user_id,activate) VALUES ('$image','$id','1')";
		if(mysqli_query($conn, $sql)) {
			echo "Image inserted successfully.";
			header('Location:../student/studentprofile.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	// Close MySQL connection
	mysqli_close($conn);
?>