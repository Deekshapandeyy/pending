<?php
session_start();
include_once "config.php";
// print_r($_POST['d']);
$del=$_POST['d'] * 1;

array_splice($_SESSION['task'],$del,1);

?>