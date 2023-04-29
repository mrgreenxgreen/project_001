<?php 

include_once('xxxdbconfig.php');

if(isset($_POST['saveprofile'])){
    // $first_name = "";
    // $middle_name = "";
    // $last_name = "";
    // $address = "";
    // $course = "";
    // $section = "";
    // $college = "";
    // $gender = "";
    // $height = "";
    // $weight = "";
    // $contact_no = "";
    // $blood_type = "";
    // $about_me = "";

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $college = $_POST['college'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $contact_no = $_POST['contact_no'];
    $blood_type = $_POST['blood_type'];
    $about_me = $_POST['about_me'];
    $user_id = $_POST['userID'];

    $SQL_update = "UPDATE  instructor SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', address = '$address', 
    course = '$course', section = '$section', college = '$college', gender = '$gender', height = '$height', weight= '$weight', contact_no = '$contact_no', 
    blood_type = '$blood_type', about_me='$about_me' WHERE user_id = '$user_id'";
  


    // $SQL_update = "UPDATE  students(first_name,middle_name, last_name, address, course, section, college, gender, height, weight, contact_no, blood_type)
    // values( '$first_name', '$middle_name', '$last_name', '$address', '$course', '$section', '$college', '$gender', '$height', '$weight', '$contact_no', '$blood_type')";
    
    if($first_name=="" || $middle_name=="" || $last_name=="" || $address == "" || $course == "" || $section == "" || $college == "" ||
        $gender == "" || $height == "" || $weight == "" || $contact_no =="" || $blood_type == "" || $about_me == ""){
            echo $first_name."<br/>";
            echo $middle_name."<br/>";
            echo $last_name."<br/>";
            echo $address."<br/>";
            echo $college."<br/>";
            echo $course."<br/>";
            echo $section."<br/>";
            echo $gender."<br/>";
            echo $height."<br/>";
            echo $weight."<br/>";
            echo $contact_no."<br/>";
            echo $blood_type."<br/>";
            echo $about_me."<br/>";
            echo "<script>alert('Please answer/rate all items')</script>";


    }else{
        $insert_query = mysqli_query($conn,$SQL_update);
        header('Location:../student/student.php');

    }

   

}



?>