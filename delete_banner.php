<?php
    session_start();
    require 'db_connect.php'; // database connect

    $id = $_GET['id']; // get the selected id
    $slq = "SELECT * FROM banners WHERE id='$id' ";
    $slq_rslt = mysqli_fetch_assoc(mysqli_query($db_connect, $slq));

    if($slq_rslt['banner_status'] != 1) {
        if($slq_rslt['delete_status'] != 0) {
            //this will be execute when you want to delete data permanently
            // select the old photo
            $slct_old_photo = "SELECT banner_img FROM banners WHERE id='$id' ";
            $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
            $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);
            // remove photo from folder
            $old_photo = "uploads/banners/". $after_assoc_old_photo['banner_img'];
            unlink($old_photo); // delete old photo from users folder
            // query to delete selected data
            $delete_info = "DELETE FROM banners WHERE id=$id";
            $delete_reslt = mysqli_query($db_connect, $delete_info);
            // redirect to users_info page afer delete selected data with session
            $_SESSION['success_del'] = "Your selected information permanently delete!";
            header('location:trashbox.php');
        }else {
            //this will be execute when you want to delete data temporarily
            $soft_dlt = "UPDATE banners SET delete_status=1 WHERE id='$id'";
            $soft_dlt_rslt = mysqli_query($db_connect, $soft_dlt);
            $_SESSION['success_del'] = "Your selected information successfully delete!";
            header('location:banners_info.php');
        }
    }else {
        //this will be executed when banner is active
        $_SESSION['error'] = "You can't delete when status is active";
        header('location:banners_info.php');
    }












    // // select the old photo
    // $slct_old_photo = "SELECT banner_img FROM banners WHERE id='$id' ";
    // $slct_old_photo_rslt = mysqli_query($db_connect, $slct_old_photo);
    // $after_assoc_old_photo = mysqli_fetch_array($slct_old_photo_rslt);
    //
    // $old_photo = "uploads/banners/". $after_assoc_old_photo['banner_img'];
    // unlink($old_photo); // delete old photo from users folder
    // // query to delete selected data
    // $delete_info = "DELETE FROM banners WHERE id=$id";
    // $delete_reslt = mysqli_query($db_connect, $delete_info);
    // // redirect to users_info page afer delete selected data with session
    // $_SESSION['success_del'] = "Your selected information successfully delete!";
    // header('location:banners_info.php');

?>
