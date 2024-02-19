<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';
    
       $cat_id = $_GET["cat_id"];     
       $main_id = $_GET["main_id"]; 
//       echo $main_id;
//       exit();
        $sql =  "DELETE FROM category  WHERE cat_id = '$cat_id'";
        $result = mysqli_query($link, $sql)or die(mysqli_error());
        
    if($sql){
        header("refresh: 1; url=category_list.php?main_id=$main_id");        
        echo "<h3>กำลังลบข้อมูล....</h3>";    
    }
    else{
	echo "Error Delete [".$sql."]";
    }
?>