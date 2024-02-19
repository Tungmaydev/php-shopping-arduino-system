<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';

 if(!isset($_POST['submit'])){
     header("refresh: 0; url= main_list.php");

}
 else{
        $name  = $_POST["main_name"];
     
        $sql ="INSERT INTO main_category (main_name) VALUES ('$name')";
        $result = mysql_query($sql);
           
        header("refresh: 1; url= main_list.php");
        echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 

 } 
    ?>