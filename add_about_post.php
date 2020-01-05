<?php
session_start();
require 'db_connect.php';

$about_title = htmlentities($_POST['about_title'], ENT_QUOTES);
$about_desp = htmlentities($_POST['about_desp'], ENT_QUOTES);
$about_sub_title = htmlentities($_POST['about_sub_title'], ENT_QUOTES);
$about_features = $_POST['about_features'];
$about_status = $_POST['about_status'];
$about_img = $_FILES['about_img'];
// create session
$_SESSION['about_title'] = $about_title;
$_SESSION['about_desp'] = $about_desp;
$_SESSION['about_sub_title'] = $about_sub_title;
$_SESSION['about_img'] = $about_img;
$_SESSION['about_status'] = $about_status;
$_SESSION['about_features'] = $about_features;

// check input about status and change about status deactive from active in database
if ($about_status==1) {
  $sql = "SELECT * FROM abouts";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE abouts SET about_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

//form validation
if(empty($about_title)){
    $_SESSION['about_title_empty'] = "Please, enter a about title!!!";
    header('location:add_about.php');
}else if(empty($about_desp)){
    $_SESSION['about_desp_empty'] = "Please, enter about description!!!";
    header('location:add_about.php');
}else if(empty($about_sub_title)){
  $_SESSION['about_sub_title_empty'] = "Please, enter your button name!!!";
  header('location:add_about.php');
}else if(empty($about_features)){
    $_SESSION['about_features_empty'] = "Please, type all features of about!!!";
    header('location:add_about.php');
}else if(empty($about_status)){
    $_SESSION['about_status_empty'] = "Please, select status!!!";
    header('location:add_about.php');
}else if(empty($about_img['name'])){
  $_SESSION['about_img_empty'] = "Please, Choose an image!!!";
  header('location:add_about.php');
}else {
    $upload_file =  $about_img;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
          $insert = "INSERT INTO abouts (about_title, about_desp, about_status, about_features, about_sub_title) VALUES('$about_title', '$about_desp', '$about_status', '$about_features', '$about_sub_title')";
            // $insert = "INSERT INTO abouts (about_title, about_sub_title, about_desp, about_status, about_features) VALUES ('$about_title', '$about_sub_title', '$about_desp', '$about_status', $about_features) ";you have to find the promlem later. why it doesn't work"? 
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/abouts/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            //update the file to database
            $update_file = "UPDATE abouts SET about_img='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "about is successfully added!";
            unset($_SESSION['about_title']);
            unset($_SESSION['about_sub_title']);
            unset($_SESSION['about_desp']);
            unset($_SESSION['about_img']);
            unset($_SESSION['about_status']);
            unset($_SESSION['about_features']);
            header('location:add_about.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:add_about.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:add_about.php');
    }
}

?>
