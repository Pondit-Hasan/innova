<?php
session_start();
require 'db_connect.php';


$testimonials_desp = htmlentities($_POST['testimonials_desp'], ENT_QUOTES);
$testimonials_author = htmlentities($_POST['testimonials_author'], ENT_QUOTES);
$testimonials_status = $_POST['testimonials_status'];
$testimonials_img = $_FILES['testimonials_img'];
// create session
$_SESSION['testimonials_desp'] = $testimonials_desp;
$_SESSION['testimonials_author'] = $testimonials_author;
$_SESSION['testimonials_img'] = $testimonials_img;
$_SESSION['testimonials_status'] = $testimonials_status;

// check input testimonials status and change testimonials status deactive from active in database
// if ($testimonials_status==1) {
//   $sql = "SELECT * FROM testimonials";
//   $sql_result = mysqli_query($db_connect, $sql);
//   foreach ($sql_result as $value) {
//     $sql = "UPDATE testimonials SET testimonials_status=2";
//     $sql_result = mysqli_query($db_connect, $sql);
//   }
// }

// validation
if(empty($testimonials_desp)){
  $_SESSION['testimonials_desp_empty'] = "Please, enter testimonials description!!!";
  header('location:add_testimonials.php');
}else if(empty($testimonials_author)){
  $_SESSION['testimonials_author_empty'] = "Please, enter testimonials author name!!!";
  header('location:add_testimonials.php');
}else if(empty($testimonials_status)){
  $_SESSION['testimonials_status_empty'] = "Please, select status!!!";
  header('location:add_testimonials.php');
}else if(empty($testimonials_img['name'])){
  $_SESSION['testimonials_img_empty'] = "Please, Choose an image!!!";
  header('location:add_testimonials.php');
}else {
    $upload_file =  $testimonials_img;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
            $insert = "INSERT INTO testimonials (testimonials_author, testimonials_desp, testimonials_status) VALUES ('$testimonials_author', '$testimonials_desp','$testimonials_status') ";
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/testimonials/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            //update the file to database
            $update_file = "UPDATE testimonials SET testimonials_img='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "testimonials is successfully added!";
            unset($_SESSION['testimonials_title']);
            unset($_SESSION['testimonials_author']);
            unset($_SESSION['testimonials_desp']);
            unset($_SESSION['testimonials_img']);
            unset($_SESSION['testimonials_status']);
            header('location:add_testimonials.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:add_testimonials.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:add_testimonials.php');
    }
}

?>
