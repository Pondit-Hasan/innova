<?php
    session_start();
    require 'db_connect.php'; // database connect

    $id = $_GET['id']; // get the selected id

    // query to delete selected data
    $delete_info = "DELETE FROM get_in_touch WHERE id=$id";
    $delete_reslt = mysqli_query($db_connect, $delete_info);
    // redirect to users_info page afer delete selected data with session
    $_SESSION['success_del'] = "Your selected information successfully delete!";
    header('location:get_in_touch_info.php');

?>
