<?php
session_start();
include("config.php");
array_push($_SESSION['task'], $_SESSION['completed'][$_POST['d']]);
$i = 0;
foreach ($_SESSION['task'] as $key => $value) {
    echo "<li><input type='checkbox' id='" . $i . "' onclick='incomplete_to_complete(this.id)'><label>" . $value . "</label><input type='text' value='Go Shopping'><button
    class='edit' id='" . $i . "' onclick='editTask(this.id)'>Edit</button><button class='delete' id='" . $i . "' onclick='deleteTask(this.id)'>Delete</button></li>";
    $i++;
}
?>