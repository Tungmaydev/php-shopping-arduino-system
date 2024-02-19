<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';

    $del_id = $_GET["del_id"];
            
        $sql =  "DELETE FROM main_category WHERE main_id = '$del_id'";
        $result = mysqli_query($link, $sql)or die(mysqli_error());

        
    if($sql){
        header("refresh: 0; url = main_list.php");
	echo "<h3>กำลังลบข้อมูล....</h3>";      
    }
    else{
	echo "Error Delete [".$sql."]";
    }

    
 
?>