<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

$banner_title = htmlentities($_POST['banner_title'], ENT_QUOTES);
$banner_desp = htmlentities($_POST['banner_desp'], ENT_QUOTES);
$banner_btn = htmlentities($_POST['banner_btn'], ENT_QUOTES);
$banner_status = $_POST['banner_status'];
$photo_update = $_FILES['banner_img'];

// check input banner status and change banner status deactive from active in database
if ($banner_status==1) {
  $sql = "SELECT * FROM banners";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE banners SET banner_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

// check if user want to update image or not
if ($photo_update['name'] != '') {
    // select the old photo
    $slct_old_photo = "SELECT banner_img FROM banners WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/banners/". $after_assoc_old_photo['banner_img'];
    unlink($old_photo); // delete old photo from users folder

    $after_explode = explode( '.', $photo_update['name']); // explode the name of image based on dot(.)
    $extn = end($after_explode); // get the extension
    $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extn, $allow_extn)) {
        if ($photo_update['size'] < 500000 ) {
          $new_photo_name = $id . '.' . $extn; // create file name
          $new_location = "uploads/banners/". $new_photo_name; //create file location
          move_uploaded_file($photo_update['tmp_name'], $new_location); // move the file to location
          // update to database
          $update_sql = "UPDATE banners SET banner_title='$banner_title', banner_desp='$banner_desp', banner_btn='$banner_btn', banner_status='$banner_status', banner_img='$new_photo_name'  WHERE id='$id' ";
          $update_result = mysqli_query($db_connect, $update_sql);
          $_SESSION['update_success'] = "The information of id#$id is successfu update!";
          header('location:banners_info.php');
        }else {
            $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
            header('location:edit_banner_info.php?id='. $id);
        }
    }else {
        $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
        header('location:edit_banner_info.php?id='. $id);
    }
}else {
  $update_sql = "UPDATE banners SET banner_title='$banner_title', banner_desp='$banner_desp', banner_btn='$banner_btn', banner_status='$banner_status' WHERE id='$id' ";
  $update_result = mysqli_query($db_connect, $update_sql);
  $_SESSION['update_success'] = "The information of id#$id is successfu update!";
  header('location:banners_info.php');
}

?>
