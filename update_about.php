<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

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

// check if user want to update image or not
if ($about_img['name'] != '') {
    // select the old photo
    $slct_old_photo = "SELECT about_img FROM abouts WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/abouts/". $after_assoc_old_photo['about_img'];
    unlink($old_photo); // delete old photo from users folder

    $after_explode = explode( '.', $about_img['name']); // explode the name of image based on dot(.)
    $extn = end($after_explode); // get the extension
    $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extn, $allow_extn)) {
        if ($about_img['size'] < 500000 ) {
          $new_photo_name = $id . '.' . $extn; // create file name
          $new_location = "uploads/abouts/". $new_photo_name; //create file location
          move_uploaded_file($about_img['tmp_name'], $new_location); // move the file to location
          // update to database
          $update_sql = "UPDATE abouts SET about_title='$about_title', about_desp='$about_desp', about_sub_title='$about_sub_title', about_features='$about_features', about_status='$about_status', about_img='$new_photo_name'  WHERE id='$id' ";
          $update_result = mysqli_query($db_connect, $update_sql);
          $_SESSION['update_success'] = "The information of id#$id is successfu update!";
          header('location:about_info.php');
        }else {
            $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
            header('location:edit_about_info.php?id='. $id);
        }
    }else {
        $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
        header('location:edit_about_info.php?id='. $id);
    }
}else {
  $update_sql = "UPDATE abouts SET about_title='$about_title', about_desp='$about_desp', about_features='$about_features', about_sub_title='$about_sub_title', about_status='$about_status' WHERE id='$id' ";
  $update_result = mysqli_query($db_connect, $update_sql);
  $_SESSION['update_success'] = "The information of id#$id is successfu update!";
  header('location:about_info.php');
}

?>
