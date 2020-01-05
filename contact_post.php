<?php
date_default_timezone_set('Asia/Dhaka');
$time = date('d-M-Y H:i:s');

session_start();
require 'db_connect.php';

$name = $_POST['fname'];
$email = $_POST['email'];
$message = htmlentities($_POST['message'], ENT_QUOTES);

// create session
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['message'] = $message;

//form validation
if(empty($name)){
    $_SESSION['name_empty'] = "Please, enter your name!!!";
    header('location:index.php#contact');
}else if(empty($email)){
    $_SESSION['email_empty'] = "Please, enter your email!!!";
    header('location:index.php#contact');
}else if(empty($message)){
    $_SESSION['message_empty'] = "Please, enter your message!!!";
    header('location:index.php#contact');
}else {
  $insert = "INSERT INTO messages (name, email, message, send_time) VALUES ('$name', '$email', '$message', '$time') ";
  $result = mysqli_query($db_connect, $insert);
  // successfull msg session
  $_SESSION['success'] = "Hi $name! Your massage is successfully sent!";
  header('location:register.php');
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  unset($_SESSION['message']);
  header('location:index.php#contact');
}

?>
