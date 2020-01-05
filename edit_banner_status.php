<?php
session_start();
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM banners WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$after_assoc = mysqli_fetch_assoc($single_select_reslt);
$banner_status = $after_assoc['banner_status'];
if ($banner_status != 1) {
  $sql = "SELECT * FROM banners";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE banners SET banner_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
  $sql_status_update = "UPDATE banners SET banner_status=1 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected banner status is successfully actived!";
  header("location:banners_info.php");
}



?>
