<?php
session_start();
require 'db_connect.php';

$name = $_POST['fnane'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], 1);
$age = $_POST['age'];
$gender = $_POST['gender'];
$role = $_POST['role'];
$image_user = $_FILES['photo'];
// create session
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['age'] = $age;
$_SESSION['gender'] = $gender;
$_SESSION['role'] = $role;
$_SESSION['photo'] = $image_user;


// database check the inputed data by user
$login_slct = "SELECT COUNT(*) as exist_user FROM users WHERE email='$email' " ;
$log_rslt = mysqli_query($db_connect, $login_slct);
$after_fetch = mysqli_fetch_assoc($log_rslt);
// // strong password validation check function
// function strong_valid_password($str) {
//     return (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $str)) ? FALSE : TRUE;
// }

//form validation
if(empty($name)){
    $_SESSION['name_empty'] = "Please, enter your name!!!";
    header('location:register.php');
}else if(empty($email)){
    $_SESSION['email_empty'] = "Please, enter your email!!!";
    header('location:register.php');
}else if(empty($password)){
    $_SESSION['pass_empty'] = "Please, enter your password!!!";
    header('location:register.php');
// }else  if (!strong_valid_password($new_pass)) {
// $_SESSION['new_pass_err'] = "Password must contain a letter, cap letter, number, special character and length between 8 to 20!";
// header('location:register.php');
}else if(empty($age)){
    $_SESSION['age_empty'] = "Please, enter your age!!!";
    header('location:register.php');
}else if(empty($gender)){
    $_SESSION['gender_empty'] = "Please, select your gender!!!";
    header('location:register.php');
}else if(empty($role)){
    $_SESSION['role_empty'] = "Please, select your role!!!";
    header('location:register.php');
}else if(!$after_fetch['exist_user']==0) {
    // error msg session if email already is existed!
    $_SESSION['exist'] = "Your email is already taken!";
    header('location:register.php');
}else if(empty($image_user)){
    $_SESSION['photo_empty'] = "Please, uplode your photo!";
    header('location:register.php');
// }else if(empty($_POST)){
//     $_SESSION['unauthorized'] = "What the hell are you trying to do!";
//     header('location:logout.php');
}else {
    $upload_file =  $image_user;
    $after_exloped = explode('.', $upload_file['name']);
    $extension = end($after_exloped);
    $allowed_extension = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($extension, $allowed_extension)) {
        if($upload_file['size'] < 500000) {
            $insert = "INSERT INTO users (name, email, password, age, gender, role) VALUES ('$name', '$email', '$password', '$age', '$gender', '$role') ";
            $result = mysqli_query($db_connect, $insert);
            // get the last insert id
            $last_id = mysqli_insert_id($db_connect);
            // create upload file's name
            $photo_name = $last_id . '.' . $extension;
            $new_location = 'uploads/users/' . $photo_name;
            move_uploaded_file($upload_file['tmp_name'], $new_location);
            // update the file to database
            $update_file = "UPDATE users SET photo='$photo_name' WHERE id='$last_id' ";
            $update_file_rslt = mysqli_query($db_connect, $update_file );
            // successfull msg session
            $_SESSION['success'] = "Your registration is successfully completed!";
            header('location:register.php');
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['age']);
            unset($_SESSION['gender']);
            unset($_SESSION['role']);
            unset($_SESSION['photo']);
            header('location:register.php');
        }else {
            $_SESSION['file_size_err'] = "File size is not allow more than 500kb! ";
            header('location:register.php');
        }
    }else {
        $_SESSION['file_format_err'] = "File format olny allow jpg/jpeg/png/gif! ";
        header('location:register.php');
    }
}

?>
