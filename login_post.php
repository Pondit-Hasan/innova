<?php
session_start();
require 'db_connect.php'; // database connect

$email = $_POST['email'];
$password = $_POST['password'];

// create session to keep the value showed
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

// database check the inputed data by user
$login_slct = "SELECT COUNT(*) as user, password, role, name, photo, id FROM users WHERE email='$email' " ;
$log_rslt = mysqli_query($db_connect, $login_slct);
$after_fetch = mysqli_fetch_assoc($log_rslt);



// echo $login_slct;
// die();

if(empty($email)){
    $_SESSION['email_empty'] = "Please, enter your email!!!";
    header('location:login.php');
}
else if(empty($password)){
    $_SESSION['pass_empty'] = "Please, enter your password!!!";
    header('location:login.php');
}
else if($after_fetch['user']==1) {
  if (password_verify($password, $after_fetch['password'])) {
    // successfull msg session if email and password is matched
    $_SESSION['loggedInUserId'] = $after_fetch['id'];
    $_SESSION['log_role'] = $after_fetch['role'];
    $_SESSION['log_name'] = $after_fetch['name'];
    $_SESSION['log_photo'] = $after_fetch['photo'];
    $_SESSION['login'] = "Registered user";
    $_SESSION['login_success'] = "You are successfully logged in!";
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    // set cookie to stay logged in
    setcookie('login_user', 'registered_member', time() + 5*(60) );
    header('location:admin.php');
  }else {
    $_SESSION['login_err'] = "Either your email or password isn't correct! ";
    header('location:login.php');
  }
  // // successfull msg session if email and password is matched
  // $_SESSION['login'] = "Registered user";
  // $_SESSION['login_success'] = "You are successfully logged in!";
  // unset($_SESSION['email']);
  // unset($_SESSION['password']);
  // // set cookie to stay logged in
  // setcookie('login_user', 'registered_member', time() + 5*(60) );
  // header('location:admin.php');

}else {
    $_SESSION['login_err'] = "Either your email or password isn't correct! ";
    header('location:login.php');
}



?>
