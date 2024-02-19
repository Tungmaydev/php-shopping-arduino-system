<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';
if(!isset($_POST['submit'])){
     header("refresh: 0; url=main_list.php");
}
 else{
    $name        = $_POST["main_name"];
    $mod_id      = $_REQUEST['mod_id'];
 
         $sql ="UPDATE  main_category SET main_name = '$name' WHERE main_id = '$mod_id'";
          mysqli_query($link, $sql)or die(mysqli_error());
           
           header("refresh: 1; url= main_list.php");
            echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 
 }        
?>