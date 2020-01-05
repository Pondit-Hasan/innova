<?php
session_start();
require 'db_connect.php';

$social_icon_name = $_POST['social_icon_name'];
$social_icon_link = $_POST['social_icon_link'];
$social_icon = $_POST['social_icon'];

// create session
$_SESSION['social_icon_name'] = $social_icon_name;
$_SESSION['social_icon_link'] = $social_icon_link;



//form validation
if(empty($social_icon_name)){
    $_SESSION['social_icon_name_empty'] = "Please, enter a social_icon name!!!";
    header('location:add_social_icon.php');
}else if(empty($social_icon_link)){
    $_SESSION['social_icon_link_empty'] = "Please, enter social icon link!!!";
    header('location:add_social_icon.php');
}else if(empty($social_icon)){
    $_SESSION['social_icon_empty'] = "Please, select social icon!!!";
    header('location:add_social_icon.php');
}else if($social_icon != $social_icon_name){
    $_SESSION['social_icon_empty'] = "Social Inoc name and icon must be same!!!";
    header('location:add_social_icon.php');
}else {
  $insert = "INSERT INTO social_icons (social_icon_name, social_icon_link, social_icon) VALUES ('$social_icon_name', '$social_icon_link', '$social_icon') ";
  $result = mysqli_query($db_connect, $insert);
  // successfull msg session
  $_SESSION['success'] = "social_icon is successfully added!";
  unset($_SESSION['social_icon_name']);
  unset($_SESSION['social_icon_link']);
  header('location:add_social_icon.php');
}

?>
