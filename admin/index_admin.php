<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arduino Bangkok</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="css_admin/main_admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wrapper">
        <?php 
             include "../library/config.php"; 
             include "branner_admin.php"; 
             include "menu_admin.php"; 
        ?> 
        <?php
             include"checklogin_admin_function.php";
              check_login("user_name","checklogin_admin_form.php");
        ?>
            <div id="content_center">                        
                    แสดงรายการ<br>
                    เพิ่ม<br>
                    แก้ไข<br>
            </div>      
            </div>
    </body>
</html>