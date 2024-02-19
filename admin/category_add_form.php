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
         include"../library/config.php"; 
         include"branner_admin.php"; 
         include"menu_admin.php";
         include("checklogin_admin_function.php");
              check_login("user_name","checklogin_admin_form.php");
        ?>
        <div id="content_center">
       <?php
          $main_id = $_GET["main_id"];
       ?>
                <p style="text-align: center; color: #FE9221;font-weight: bold;font-size: 20px;">Add Category</p>
<!--               <form action="category_add.php" method="post" enctype="multipart/form-data" >-->
                <form>
                   <table style="font-size: medium; margin: auto; width: 90%;"  border="1" cellpadding="2" cellspacing="0">
                        <tr>
                           <td style="background-color:#93c3cd; color: #004d4d; width: 30%; height: 40px; text-align: center; font-weight: bold; font-size: 19px;"  >Category Name</td>
                           <td>
                               <input style="height: 39px; width: 99%; font-size: 18px;" type="text" name="cat_name" size="100" maxlength="100" required>
                               <input type="hidden" name="main_id" value="<?php echo $main_id; ?>" >
                           </td> 
                       </tr>                       
                       </table><br><br>                   
                       <div style="text-align: center;">
                            <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="button" onClick='window.history.back()' >Back</button>  
                            <button style="border-radius:8px; padding: 9px 11px;  width: 20%; background-color:#93c3cd;  color: #004d4d; font-size: 15px; font-weight: bold;"  height="50px;" type="submit" name="submit" formaction="category_add.php" formmethod="post"/>Add Main Category</button>                      
                        </div>
                </form>
        </div>      
        </div>
        
    </body>
</html>