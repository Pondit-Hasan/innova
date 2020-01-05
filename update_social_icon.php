<?php
session_start();
require 'db_connect.php';

$id = $_POST['id'];

$social_icon_name = $_POST['social_icon_name'];
$social_icon_link = $_POST['social_icon_link'];
$social_icon = $_POST['social_icon'];

$update_sql = "UPDATE social_icons SET social_icon_name='$social_icon_name', social_icon_link='$social_icon_link', social_icon='$social_icon'  WHERE id='$id' ";
$result = mysqli_query($db_connect, $update_sql);
// successfull msg session
$_SESSION['success'] = "social_icon is successfully updated!";
header('location:social_icons_info.php');

?>
