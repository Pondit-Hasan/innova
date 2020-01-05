<?php
    session_start();
    require 'db_connect.php'; // database connect

    $id = $_GET['id']; // get the selected id
    $slct_old_photo = "SELECT logo_img FROM logoes WHERE id='$id' ";
    $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);

    $old_photo = "uploads/logoes/". $after_assoc_old_photo['logo_img'];
    unlink($old_photo); // delete old photo from logoes folder
    // query to delete selected data
    $delete_info = "DELETE FROM logoes WHERE id=$id";
    $delete_reslt = mysqli_query($db_connect, $delete_info);
    // redirect to logoes_info page afer delete selected data with session
    $_SESSION['success_del'] = "Your selected information successfully delete!";
    header('location:logoes_info.php');

?>
