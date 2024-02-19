<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';
    
if(!isset($_POST['submit'])){
     header("refresh: 0; url=category_list.php");
}
 else{
    $cat_id     = $_REQUEST['cat_id']; 
    $name       = $_POST["cat_name"];
    $main_id    = $_REQUEST["main_id"];
 
       $sql ="UPDATE  category SET cat_name = '$name' WHERE cat_id = '$cat_id'";
       mysqli_query($link, $sql)or die(mysqli_error());
           
           header("refresh: 1; url=category_list.php?main_id=$main_id");
           
          echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 
         
           
    
 }

    ?>