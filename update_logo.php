<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

$logo_title = $_POST['logo_title'];
$logo_desp = $_POST['logo_desp'];
$logo_btn = $_POST['logo_btn'];
$logo_status = $_POST['logo_status'];
$photo_update = $_FILES['logo_img'];

// check input logo status and change logo status deactive from active in database
if ($logo_status==1) {
  $sql = "SELECT * FROM logoes";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE logoes SET logo_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

// check if user want to update image or not
if ($photo_update['name'] != '') {
    // select the old photo
    $slct_old_photo = "SELECT logo_img FROM logoes WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/logoes/". $after_assoc_old_photo['logo_img'];
    unlink($old_photo); // delete old photo from users folder

    $after_explode = explode( '.', $photo_update['name']); // explode the name of image based on dot(.)
    $extn = end($after_explode); // get the extension
    $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extn, $allow_extn)) {
        if ($photo_update['size'] < 500000 ) {
          $new_photo_name = $id . '.' . $extn; // create file name
          $new_location = "uploads/logoes/". $new_photo_name; //create file location
          move_uploaded_file($photo_update['tmp_name'], $new_location); // move the file to location
          // update to database
          $update_sql = "UPDATE logoes SET logo_title='$logo_title', logo_desp='$logo_desp', logo_btn='$logo_btn', logo_status='$logo_status', logo_img='$new_photo_name'  WHERE id='$id' ";
          $update_result = mysqli_query($db_connect, $update_sql);
          $_SESSION['update_success'] = "The information of id#$id is successfu update!";
          header('location:logoes_info.php');
        }else {
            $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
            header('location:edit_logo_info.php?id='. $id);
        }
    }else {
        $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
        header('location:edit_logo_info.php?id='. $id);
    }
}else {
  $update_sql = "UPDATE logoes SET logo_title='$logo_title', logo_desp='$logo_desp', logo_btn='$logo_btn', logo_status='$logo_status' WHERE id='$id' ";
  $update_result = mysqli_query($db_connect, $update_sql);
  $_SESSION['update_success'] = "The information of id#$id is successfu update!";
  header('location:logoes_info.php');
}

?>
