<?php
session_start();
require 'db_connect.php';

$get_in_touch_title = $_POST['get_in_touch_title'];
$get_in_touch_desp = $_POST['get_in_touch_desp'];
$get_in_touch_btn = $_POST['get_in_touch_btn'];
$get_in_touch_status = $_POST['get_in_touch_status'];

// create session
$_SESSION['get_in_touch_title'] = $get_in_touch_title;
$_SESSION['get_in_touch_desp'] = $get_in_touch_desp;
$_SESSION['get_in_touch_btn'] = $get_in_touch_btn;

$_SESSION['get_in_touch_status'] = $get_in_touch_status;

// check input get_in_touch status and change get_in_touch status deactive from active in database
if ($get_in_touch_status==1) {
  $sql = "SELECT * FROM get_in_touch";
  $sql_result = mysqli_query($db_connect, $sql);
  foreach ($sql_result as $value) {
    $sql = "UPDATE get_in_touch SET get_in_touch_status=2";
    $sql_result = mysqli_query($db_connect, $sql);
  }
}

//form validation
if(empty($get_in_touch_title)){
    $_SESSION['get_in_touch_title_empty'] = "Please, enter a get_in_touch title!!!";
    header('location:add_get_in_touch.php');
}else if(empty($get_in_touch_desp)){
    $_SESSION['get_in_touch_desp_empty'] = "Please, enter get_in_touch description!!!";
    header('location:add_get_in_touch.php');
}else if(empty($get_in_touch_btn)){
    $_SESSION['get_in_touch_btn_empty'] = "Please, enter your button name!!!";
    header('location:add_get_in_touch.php');
}else if(empty($get_in_touch_status)){
    $_SESSION['get_in_touch_status_empty'] = "Please, select status!!!";
    header('location:add_get_in_touch.php');
}else {
  $insert = "INSERT INTO get_in_touch (get_in_touch_title, get_in_touch_btn, get_in_touch_desp, get_in_touch_status) VALUES ('$get_in_touch_title', '$get_in_touch_btn', '$get_in_touch_desp','$get_in_touch_status') ";
  $result = mysqli_query($db_connect, $insert);
  // successfull msg session
  $_SESSION['success'] = "get_in_touch is successfully added!";
  unset($_SESSION['get_in_touch_title']);
  unset($_SESSION['get_in_touch_btn']);
  unset($_SESSION['get_in_touch_desp']);
  unset($_SESSION['get_in_touch_status']);
  header('location:add_get_in_touch.php');
}

?>
