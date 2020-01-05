<?php
session_start();
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM get_in_touch WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$after_assoc = mysqli_fetch_assoc($single_select_reslt);
$get_in_touch_status = $after_assoc['get_in_touch_status'];
if ($get_in_touch_status != 1) {
  $sql = "SELECT * FROM get_in_touch";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE get_in_touch SET get_in_touch_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
  $sql_status_update = "UPDATE get_in_touch SET get_in_touch_status=1 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected get in touch status is successfully actived!";
  header("location:get_in_touch_info.php");
}



?>
