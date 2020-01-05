<?php
session_start();
require 'db_connect.php';

$banner_title = htmlentities($_POST['banner_title'], ENT_QUOTES);
$banner_desp = htmlentities($_POST['banner_desp'], ENT_QUOTES);
$banner_btn = htmlentities($_POST['banner_btn'], ENT_QUOTES);
$banner_status = $_POST['banner_status'];
$banner_img = $_FILES['banner_img'];
// create session
$_SESSION['banner_title'] = $banner_title;
$_SESSION['banner_desp'] = $banner_desp;
$_SESSION['banner_btn'] = $banner_btn;
$_SESSION['banner_img'] = $banner_img;
$_SESSION['banner_status'] = $banner_status;

// check input banner status and change banner status deactive from active in database
if ($banner_status==1) {
  $sql = "SELECT * FROM banners";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE banners SET banner_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

//form validation
if(empty($banner_title)){
    $_SESSION['banner_title_empty'] = "Please, enter a banner title!!!";
    header('location:add_banner.php');
}else if(empty($banner_desp)){
    $_SESSION['banner_desp_empty'] = "Please, enter banner description!!!";
    header('location:add_banner.php');
}else if(empty($banner_img['name'])){
    $_SESSION['banner_img_empty'] = "Please, Choose an image!!!";
    header('location:add_banner.php');
}else if(empty($banner_btn)){
    $_SESSION['banner_btn_empty'] = "Please, enter your button name!!!";
    header('location:add_banner.php');
}else if(empty($banner_status)){
    $_SESSION['banner_status_empty'] = "Please, select status!!!";
    header('location:add_banner.php');
}else {
    $upload_file =  $banner_img;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
            $insert = "INSERT INTO banners (banner_title, banner_btn, banner_desp, banner_status) VALUES ('$banner_title', '$banner_btn', '$banner_desp','$banner_status') ";
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/banners/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            //update the file to database
            $update_file = "UPDATE banners SET banner_img='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "Banner is successfully added!";
            unset($_SESSION['banner_title']);
            unset($_SESSION['banner_btn']);
            unset($_SESSION['banner_desp']);
            unset($_SESSION['banner_img']);
            unset($_SESSION['banner_status']);
            header('location:add_banner.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:add_banner.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:add_banner.php');
    }
}

?>
