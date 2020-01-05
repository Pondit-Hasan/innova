<?php
session_start();
require 'db_connect.php';
require 'functions.php';

$id = $_GET['id'];
$x = explode('-',$id);

restoreData('falcon', $x[0], $x[1]);


?>
