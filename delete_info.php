<?php
    session_start();
    require 'db_connect.php'; // database connect
    require 'functions.php'; // database connect

    $id = $_GET['id']; // get the selected id
    echo $loggedInUserId= $_SESSION['loggedInUserId'];
    // query for check designation
    $designation = "SELECT * FROM users WHERE id='$loggedInUserId'";
    $designation_rslt_after_assoc = mysqli_fetch_assoc(mysqli_query($db_connect, $designation));

if ($id == $_SESSION['loggedInUserId']) {
  // user can't delete own info untill superadmin give permission
  $_SESSION['notAllow'] = "You can't delete your own account!";
  header('location:users_info.php');
} else if($designation_rslt_after_assoc['role'] > 1) {
  // no one except admin can delete users' account
  $_SESSION['notAllow'] = "I am afraid you are not allow to delete users' account! :) ";
  header('location:users_info.php');
} else {
  // select the old photo
  $slct_old_photo = "SELECT photo FROM users WHERE id='$id' ";
  $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
  $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

  $old_photo = "uploads/users/". $after_assoc_old_photo['photo'];
  unlink($old_photo); // delete old photo from users folder
  // query to delete selected data
  FunctionDelete(users, $id);
  // redirect to users_info page afer delete selected data with session
  $_SESSION['success_del'] = "Your selected information successfully delete!";
  header('location:users_info.php');
}





?>
