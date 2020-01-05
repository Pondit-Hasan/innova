<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];


$testimonials_desp = htmlentities($_POST['testimonials_desp'], ENT_QUOTES);
$testimonials_author = htmlentities($_POST['testimonials_author'], ENT_QUOTES);
$testimonials_status = $_POST['testimonials_status'];
$photo_update = $_FILES['testimonials_img'];

// check input testimonials status and change testimonials status deactive from active in database
// if ($testimonials_status==1) {
//   $sql = "SELECT * FROM testimonials";
//   $sql_result = mysqli_query($db_connect, $sql);
//   foreach ($sql_result as $value) {
//     $sql = "UPDATE testimonials SET testimonials_status=2";
//     $sql_result = mysqli_query($db_connect, $sql);
//   }
// }

// check if user want to update image or not
if ($photo_update['name'] != '') {
    // select the old photo
    $slct_old_photo = "SELECT testimonials_img FROM testimonials WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/testimonials/". $after_assoc_old_photo['testimonials_img'];
    unlink($old_photo); // delete old photo from users folder

    $after_explode = explode( '.', $photo_update['name']); // explode the name of image based on dot(.)
    $extn = end($after_explode); // get the extension
    $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($extn, $allow_extn)) {
        if ($photo_update['size'] < 500000 ) {
          $new_photo_name = $id . '.' . $extn; // create file name
          $new_location = "uploads/testimonials/". $new_photo_name; //create file location
          move_uploaded_file($photo_update['tmp_name'], $new_location); // move the file to location
          // update to database
          $update_sql = "UPDATE testimonials SET testimonials_desp='$testimonials_desp', testimonials_author='$testimonials_author', testimonials_status='$testimonials_status', testimonials_img='$new_photo_name'  WHERE id='$id' ";
          $update_result = mysqli_query($db_connect, $update_sql);
          $_SESSION['update_success'] = "The information of id#$id is successfu update!";
          header('location:testimonials_info.php');
        }else {
            $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
            header('location:edit_testimonials_info.php?id='. $id);
        }
    }else {
        $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
        header('location:edit_testimonials_info.php?id='. $id);
    }
}else {
  $update_sql = "UPDATE testimonials SET testimonials_desp='$testimonials_desp', testimonials_author='$testimonials_author', testimonials_status='$testimonials_status' WHERE id='$id' ";
  $update_result = mysqli_query($db_connect, $update_sql);
  $_SESSION['update_success'] = "The information of id#$id is successfu update!";
  header('location:testimonials_info.php');
}

?>
