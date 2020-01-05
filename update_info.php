<?php
session_start();
require 'db_connect.php';

$loggedInUserId = $_SESSION['loggedInUserId'];
$login_slct = "SELECT * FROM users WHERE id='$loggedInUserId' " ;
$log_rslt = mysqli_query($db_connect, $login_slct);
$after_fetch = mysqli_fetch_assoc($log_rslt);

$id = $_POST['id'];

$sql = "SELECT role FROM users WHERE id='$id' ";
$sql_result = mysqli_fetch_assoc(mysqli_query($db_connect, $sql));


$name = $_POST['fnane'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$role = $_POST['role'];
$photo_update = $_FILES['photo'];
$passConfrm = $_POST['passConfrm'];
$txtarea = $_POST['txtarea'];
// allow admin and Modarator to update user's info
if ($after_fetch['role'] ==1 OR $after_fetch['role'] ==2 ) {
  $password = $after_fetch['password'];
}
// only supperior can update user's info
if ($sql_result['role'] >= $after_fetch['role']) {
  // check if user want to update image or not
  if ($photo_update['name'] != '') {
      // select the old photo
      $slct_old_photo = "SELECT photo FROM users WHERE id='$id' ";
      $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
      $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

      $old_photo = "uploads/users/". $after_assoc_old_photo['photo'];
      unlink($old_photo); // delete old photo from users folder

      $after_explode = explode( '.', $photo_update['name']); // explode the name of image based on dot(.)
      $extn = end($after_explode); // get the extension
      $allow_extn = array('jpg', 'jpeg', 'png', 'gif');
      if (in_array($extn, $allow_extn)) {
          if ($photo_update['size'] < 500000 ) {
              if (empty($passConfrm)) {
                  $_SESSION['ConfrmPass_empty'] = "To update your info you must provide your password!!!";
                  header('location:edit_user_info.php?id='. $id);
              }elseif (password_verify($passConfrm, $password)) {
                  $new_photo_name = $id . '.' . $extn; // create file name
                  $new_location = "uploads/users/". $new_photo_name; //create file location
                  move_uploaded_file($photo_update['tmp_name'], $new_location); // move the file to location
                  // update to database
                  $update_sql = "UPDATE users SET name='$name', age='$age', gender='$gender', role='$role', photo='$new_photo_name'  WHERE id='$id' ";
                  $update_result = mysqli_query($db_connect, $update_sql);
                  $_SESSION['update_success'] = "$name's information is successfully update!";
                  header('location:users_info.php');
              }else {
                  $_SESSION['ConfrmPass_err'] = "Password is incorrect!!!";
                  header('location:edit_user_info.php?id='. $id);
              }
          }else {
              $_SESSION['size_err'] = "Size of image is not allowed more than 500kb!";
              header('location:edit_user_info.php?id='. $id);
          }
      }else {
          $_SESSION['format_err'] = "Format of image must be jpg/jpeg/png/gif!";
          header('location:edit_user_info.php?id='. $id);
      }
  }else {
      if (empty($passConfrm)) {
          $_SESSION['ConfrmPass_empty'] = "To update your info you must provide your password!!!";
          header('location:edit_user_info.php?id='. $id);
      }else if (password_verify($passConfrm, $password)) {
          $update_sql = "UPDATE users SET name='$name', email='$email', age='$age', gender='$gender', role='$role' WHERE id='$id' ";

          $update_result = mysqli_query($db_connect, $update_sql);

          $_SESSION['update_success'] = "$name's information is successfu update!";
          header('location:users_info.php');
      }else {
          $_SESSION['ConfrmPass_err'] = "Password is incorrect!!!";
          header('location:edit_user_info.php?id='. $id);
      }
  }
} else {
  // code...
  $_SESSION['ConfrmPass_err'] = "You can't edit admin's profile.";
  header('location:edit_user_info.php?id='. $id);
}


?>
