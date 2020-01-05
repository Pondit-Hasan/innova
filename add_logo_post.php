<?php
session_start();
require 'db_connect.php';

$logo_status = $_POST['logo_status'];
$logo_img = $_FILES['logo_img'];
// create session
$_SESSION['logo_img'] = $logo_img;
$_SESSION['logo_status'] = $logo_status;

// check input logo status and change logo status deactive from active in database
if ($logo_status==1) {
  $sql = "SELECT * FROM logoes";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE logoes SET logo_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

//form validation
if(empty($logo_status)){
    $_SESSION['logo_status_empty'] = "Please, select status!!!";
    header('location:add_logo.php');
}else {
    $upload_file =  $logo_img;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
            $insert = "INSERT INTO logoes (logo_status) VALUES ('$logo_status') ";
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/logoes/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            //update the file to database
            $update_file = "UPDATE logoes SET logo_img='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "logo is successfully added!";;
            unset($_SESSION['logo_img']);
            unset($_SESSION['logo_status']);
            header('location:add_logo.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:add_logo.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:add_logo.php');
    }
}

?>
