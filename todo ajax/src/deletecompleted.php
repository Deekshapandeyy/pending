<?php
session_start();
include_once "config.php";
session_start();
include_once("config.php");
array_splice($_SESSION['completed'], $_POST['d'], 1);
$i = 0;
foreach ($_SESSION['completed'] as $key => $value) {
    echo "<li><input type='checkbox' id='" . $i . "' onclick='incomplete_to_complete(this.id)'><label>" . $value . "</label><input type='text' value='Go Shopping'><button class='delete' id='" . $i . "' onclick='deleteTaskCompleted(this.id)'>Delete</button></li>";
    $i++;
}
// echo "<pre>";
// print_r($_SESSION['completed']);
// echo "</pre>";
//  $str .= "<li><input type='checkbox'checked name='checkme'  
//     id=$i onclick='incomplete_to_complete(this.id)'><label>$value</label><input type='text'>
//     <button class='delete'id=$i onclick='deletetask(this.id)'>Delete</button></li>";
//     $i++;
   
   
    

//  echo ($str);


?>