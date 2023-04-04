<?php
session_start();
include_once "config.php";
array_push($_SESSION['idUpdate'], $_POST["d"]);
echo $_SESSION['task'][$_POST['d']];

?>