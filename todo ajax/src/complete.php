<?php
session_start();
include_once "config.php";

//print_r(array_splice($_SESSION['task'],$i,1));
array_push($_SESSION['completed'],$_SESSION['task'][$_POST['d']]);

//     session_destroy();
$i = 0;
foreach ($_SESSION['completed'] as $key => $value) {
    echo "<li><input type='checkbox' id='" . $i . "' onclick='completedRevert(this.id)'><label>" . $value . "</label><input type='text' value='Go Shopping'><button class='delete' id='" . $i . "' onclick='deleteTaskCompleted(this.id)'>Delete</button></li>";
    $i++;
}
?>