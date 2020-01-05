<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

$service_title = $_POST['service_title'];
$service_desp = $_POST['service_desp'];
$service_status = $_POST['service_status'];
$photo_update = $_FILES['service_img'];

// check input service status and change service status deactive from active in database
if ($service_status==1) {
  $sql = "SELECT * FROM services";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE services SET service_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

// check if user want to update image or not
if ($photo_update['name'] != '') {
    // select the old photo
    $slct_old_photo = "SELECT service_img FROM services WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/services/". $after_assoc_old_photo['service_img'];
    unlink($old_photo); // delete old photo from users folder

    $after_explode = explode( '.', $photo_update['name']); // explode the name of image based on dot(.)
    $extn = end($after_explode); // get the extension
    $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extn, $allow_extn)) {
        if ($photo_update['size'] < 500000 ) {
          $new_photo_name = $id . '.' . $extn; // create file name
          $new_location = "uploads/services/". $new_photo_name; //create file location
          move_uploaded_file($photo_update['tmp_name'], $new_location); // move the file to location
          // update to database
          $update_sql = "UPDATE services SET service_title='$service_title', service_desp='$service_desp', service_status='$service_status', service_img='$new_photo_name'  WHERE id='$id' ";
          $update_result = mysqli_query($db_connect, $update_sql);
          $_SESSION['update_success'] = "The information of id#$id is successfu update!";
          header('location:services_info.php');
        }else {
            $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
            header('location:edit_service_info.php?id='. $id);
        }
    }else {
        $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
        header('location:edit_service_info.php?id='. $id);
    }
}else {
  $update_sql = "UPDATE services SET service_title='$service_title', service_desp='$service_desp', service_status='$service_status' WHERE id='$id' ";
  $update_result = mysqli_query($db_connect, $update_sql);
  $_SESSION['update_success'] = "The information of id#$id is successfu update!";
  header('location:services_info.php');
}

?>
