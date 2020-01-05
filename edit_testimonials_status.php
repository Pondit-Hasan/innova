<?php
session_start();
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM testimonials WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$after_assoc = mysqli_fetch_assoc($single_select_reslt);
$testimonials_status = $after_assoc['testimonials_status'];
if ($testimonials_status != 1) {
  // $sql = "SELECT * FROM testimonials";
  // $sql_result = mysqli_query($db_connect, $sql);
  // foreach ($sql_result as $value) {
  //   $sql = "UPDATE testimonials SET testimonials_status=2";
  //   $sql_result = mysqli_query($db_connect, $sql);
  // }
  $sql_status_update = "UPDATE testimonials SET testimonials_status=1 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected testimonials status is successfully actived!";
  header("location:testimonials_info.php");
}else {
  $sql_status_update = "UPDATE testimonials SET testimonials_status=2 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected testimonials status is successfully actived!";
  header("location:testimonials_info.php");
}



?>
