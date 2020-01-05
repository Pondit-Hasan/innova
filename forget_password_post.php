<?php
    session_start();
    $new_pass =password_hash( $_POST['new_pass'],1);
    $new_pass_confrm = $_POST['new_pass_confrm'];
    require 'db_connect.php';
    if (!empty($_POST['login_exist_user_email'])) {
        $exit_user_email = $_POST['login_exist_user_email'];
        if (empty($new_pass)) {
            $_SESSION['new_pass_empty'] = "Please, enter your new password!";
            header('location:reset_password.php');
        }else if (empty($new_pass_confrm)) {
            $_SESSION['new_pass_confrm_empty'] = "Please, retype your new password!";
            header('location:reset_password.php');
        }else {
            if(password_verify($new_pass_confrm, $new_pass)) {
              $slct_user_frm_db = "UPDATE users SET password='$new_pass' WHERE email='$exit_user_email' ";
              $slct_user_frm_db_rslt = mysqli_query($db_connect, $slct_user_frm_db);
              $_SESSION['reset_succ'] = "Your password is successfully reset!";
              header('location:login.php');
            }else {
              $_SESSION['new_pass_err'] = "Password doesn't match!";
              header('location:reset_password.php');
            }
        }
    }else {
        $email = $_POST['user_email'];
        if(empty($email)) {
            $_SESSION['email_empty'] = "Please, enter your email!!!";
            header('location:forget_password.php');
        } else {
            $login_slct = "SELECT COUNT(*) as exist_user FROM users WHERE email='$email' " ;
            $log_rslt = mysqli_query($db_connect, $login_slct);
            $after_fetch = mysqli_fetch_assoc($log_rslt);
            if($after_fetch['exist_user']==1){
                $_SESSION['user_email'] = $email;
                header('location:reset_password.php');
            } else {
                $_SESSION['userNotFound'] = "Your entered eamil doesn't exist!";
                header('location:forget_password.php');
            }
        }
    }

?>
