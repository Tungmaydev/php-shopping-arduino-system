<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';

if(!isset($_POST['submit'])){
      header("refresh: 0; url= category_list.php");
}
 else{          
         if(!empty($_POST)){ //ถ้าไม่มีค่าว่าง

             $name     = $_POST["cat_name"];
             $main_id  = $_REQUEST["main_id"];

               $sql    = "INSERT INTO category (cat_name,main_id) VALUES ('$name','$main_id')";
               $result = mysqli_query($link, $sql)or die(mysqli_error());
               header("refresh: 1; url=category_list.php?main_id=$main_id");
                echo "<h3>กำลังบันทึกข้อมูลใหม่....</h3>"; 
        }
        else{
               echo "<h3>ล้มเหลว!</h3>";

        }
 }
 
    ?>