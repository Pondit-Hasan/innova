<?php
    session_start();
    require 'db_connect.php'; // database connect
    require 'functions.php';

    $id = $_GET['id'];
    $x = explode('-',$id);
// call delete function
    deleteWithOutImage('falcon', $x[0], $x[1]);

?>
