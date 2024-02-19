<?php
header('Content-Type: text/html; charset=utf-8'); 
require_once '../library/config.php';

       $pd_id = $_GET["pd_id"];
       $cat_id = $_GET['cat_id'];
      
        $sql =  "DELETE FROM product  WHERE pd_id = '$pd_id'";
        $result = mysqli_query($link, $sql)or die(mysqli_error());
    if($sql){
        
        header("refresh: 0; url=product_list.php?cat_id=$cat_id");
        echo "<h3>กำลังลบข้อมูล....</h3>"; 
        
        
       
    }
    else{
	echo "Error Delete [".$sql."]";
    }


    ?>
