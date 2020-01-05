<?php
session_start();
require 'db_connect.php';

$id = $_GET['id'];
$single_user_info_select = "SELECT * FROM services WHERE id=$id";
$single_select_reslt = mysqli_query($db_connect, $single_user_info_select);
$after_assoc = mysqli_fetch_assoc($single_select_reslt);

// task #1: later you are gonna do a query for counting how many status are active

$service_status = $after_assoc['service_status'];
if ($service_status != 1) {
  // $sql = "SELECT * FROM services";
  // $sql_result = mysqli_query($db_connect, $sql);
  // foreach ($sql_result as $value) {
  //   $sql = "UPDATE services SET service_status=2";
  //   $sql_result = mysqli_query($db_connect, $sql);
  // }
  $sql_status_update = "UPDATE services SET service_status=1 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected service status is successfully actived!";
  header("location:services_info.php");
} else {
  $sql_status_update = "UPDATE services SET service_status=2 WHERE id='$id'";
  $sql_status_update_result = mysqli_query($db_connect, $sql_status_update);
  $_SESSION['status_update'] = "Your selected service status is successfully actived!";
  header("location:services_info.php");
}



?>
