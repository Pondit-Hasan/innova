<?php
session_start();
require 'db_connect.php';

$service_title = $_POST['service_title'];
$service_desp = $_POST['service_desp'];
$service_status = $_POST['service_status'];
$service_img = $_FILES['service_img'];
// create session
$_SESSION['service_title'] = $service_title;
$_SESSION['service_desp'] = $service_desp;
$_SESSION['service_img'] = $service_img;
$_SESSION['service_status'] = $service_status;

// check input service status and change service status deactive from active in database
// if ($service_status==1) {
//   $sql = "SELECT * FROM services";
//   $sql_result = mysqli_query($db_connect, $sql);
//   foreach ($sql_result as $value) {
//     $sql = "UPDATE services SET service_status=2";
//     $sql_result = mysqli_query($db_connect, $sql);
//   }
// }

//form validation
if(empty($service_title)){
    $_SESSION['service_title_empty'] = "Please, enter a service title!!!";
    header('location:add_service.php');
}else if(empty($service_desp)){
    $_SESSION['service_desp_empty'] = "Please, enter service description!!!";
    header('location:add_service.php');
}else if(empty($service_img['name'])){
    $_SESSION['service_img_empty'] = "Please, Choose an image!!!";
    header('location:add_service.php');
}else if(empty($service_status)){
    $_SESSION['service_status_empty'] = "Please, select status!!!";
    header('location:add_service.php');
}else {
    $upload_file =  $service_img;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
            $insert = "INSERT INTO services (service_title, service_desp, service_status) VALUES ('$service_title', '$service_desp','$service_status') ";
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/services/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            //update the file to database
            $update_file = "UPDATE services SET service_img='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "service is successfully added!";
            unset($_SESSION['service_title']);
            unset($_SESSION['service_desp']);
            unset($_SESSION['service_img']);
            unset($_SESSION['service_status']);
            header('location:add_service.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:add_service.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:add_service.php');
    }
}

?>
