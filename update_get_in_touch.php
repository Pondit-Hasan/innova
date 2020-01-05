<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

$get_in_touch_title = htmlentities($_POST['get_in_touch_title'], ENT_QUOTES);
$get_in_touch_desp = htmlentities($_POST['get_in_touch_desp'], ENT_QUOTES);
$get_in_touch_btn = $_POST['get_in_touch_btn'];
$get_in_touch_status = $_POST['get_in_touch_status'];
$photo_update = $_FILES['get_in_touch_img'];

// check input get_in_touch status and change get_in_touch status deactive from active in database
if ($get_in_touch_status==1) {
  $sql = "SELECT * FROM get_in_touch";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE get_in_touch SET get_in_touch_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

$update_sql = "UPDATE get_in_touch SET get_in_touch_title='$get_in_touch_title', get_in_touch_desp='$get_in_touch_desp', get_in_touch_btn='$get_in_touch_btn', get_in_touch_status='$get_in_touch_status' WHERE id='$id' ";
$update_result = mysqli_query($db_connect, $update_sql);
$_SESSION['update_success'] = "The information of id#$id is successfu update!";
header('location:get_in_touch_info.php');

?>
