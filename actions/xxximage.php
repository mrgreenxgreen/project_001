<?php
   session_start();
   include_once('xxxdbconfig.php');
    $id = $_SESSION['user_id'];
    // Retrieve image data from MySQL database
    $sql = "SELECT picture FROM pictures WHERE user_id = $id AND activate = 1 "; // Replace 1 with the image id you want to retrieve
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['picture'];
        header("Content-type: image/jpeg"); // Replace "jpeg" with the appropriate image format
        echo $imageData;
    } else {
        echo "Image not found.";
    }

    // Close MySQL connection
    mysqli_close($conn);
?>