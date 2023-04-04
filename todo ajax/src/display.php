<?php
session_start();
include_once "config.php";

 $str="";
 $i=0;
//echo $str;
foreach($_SESSION['task'] as $key=>$value)
{
  

    echo "<li><input type='checkbox' name='checkme' class='incomplete' id='".$i."' onclick='incomplete_to_complete(this.id)'><label>".$value."</label><input type='text'>
    <button class='edit' id='".$i."' onclick='edittask(this.id)' >Edit</button>
    <button class='delete'id='".$i."' onclick='deletetask(this.id)'>Delete</button></li>";
    $i++;
   
   
    
}
 


?>