<?php
if (!isset($_COOKIE['login_user'])) {
    header('location:login.php');
} else {
    setcookie('login_user', 'registered_member', time() + 15*(60) );
}

?>
